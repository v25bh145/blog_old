<?php

namespace App\Http\Controllers;

use App\Models\article_tag_relation;
use App\Models\articles;
use App\Models\chapters;
use App\Models\longs;
use App\Models\tags;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class ArticleController extends Controller
{
    public function getAboutMe(){
        $aboutMe = articles::query()
            ->where("title", "AboutMe")
            ->get()
            ->toArray();
        return json_encode($aboutMe);
    }

    public function viewInTag($tag_id, $page){
        if($page < 1) return null;

        $allRelations = article_tag_relation::query()
            ->where("tag_id", $tag_id)
            ->get()
            ->toArray();
        $counts = count($allRelations);
        $relations = getAmount(10, $allRelations, $page);

        if($relations == false) return json_encode([]);
        $res = [];
        for($i = 0; $i < count($relations); ++$i){
            $articleId = $relations[$i]["article_id"];
            $article = articles::query()
                ->where("id", $articleId)
                ->get()
                ->toArray();
            $res[$i] = $article[0];
        }
        if($page == 1) $res['articlesAmount'] = $counts;
        if(!$res) return null;
        else return json_encode($res);
    }

    public function briefShort($page){
        if($page < 1) return null;

        $allShorts = articles::query()
            ->where("is_long", false)
            ->get()
            ->toArray();

        $res = getAmount(10, $allShorts, $page);


        if($page == 1)
            $res['shortsAmount'] = articles::query()->where("is_long", false)->count();

        if(!$res) return null;
        else return json_encode($res);
    }

    public function briefLong($page){
        if($page < 1) return null;

        $allLongs = DB::table("longs")
            ->get()
            ->toArray();

        $res = getAmount(10, $allLongs, $page);


        if($page == 1)
            $res['longsAmount'] = DB::table('longs')->count();

        if(!$res) return null;
        else return json_encode($res);
    }

    /**
     * 返回一个article的全部信息，包括所包含的tags
     * @param $id
     * @return false|string|null
     */
    public function getArticle($id)
    {
        $article = articles::query()
            ->where("id", $id)
            ->get()
            ->toArray();
        if($article == []) return null;
        else{
            $res = articleAssign($article, 0);

            $res["tags"] = null;
            $tagRelations = DB::table("article_and_tag")
                ->where("article_id", $res["id"])
                ->get()
                ->toArray();
            $tagsCount = count($tagRelations);
            for($i = 0; $i < $tagsCount; ++$i)
                $res["tags"][$i] = tags::query()
                    ->where("id", $tagRelations[$i]->tag_id)
                    ->get()
                    ->toArray();
            return json_encode($res);
        }
    }

    /**
     * 返回详细的long，从包括的chapters到archives的全部信息
     * 用于侧边栏
     * 不返回tags,tags在文章单页显示
     * @param $id
     * @return mixed|null
     */
    public function getLong($id)
    {
        $long = longs::query()
            ->where("id", $id)
            ->get()
            ->toArray();
        if($long == []) return null;
        else{
            $res = longAssign($long, 0);

            $chapters = chapters::query()
                ->where("long_id", $res["id"])
                ->orderBy("order")
                ->get()
                ->toArray();
            $chaptersCount = count($chapters);
            for($i = 0; $i < $chaptersCount; ++$i){
                $thisChapter = chapterAssign($chapters, $i);
                $articles = articles::query()
                    ->where("chapter_id", $thisChapter["id"])
                    ->orderBy("chapter_order")
                    ->get()
                    ->toArray();
                $archiveCount = count($articles);
                for($j = 0; $j < $archiveCount; ++$j) {
                    $thisArticle = articleAssign($articles, $j);
                    $thisChapter["articles"][$j] = $thisArticle;
                }
                $res["chapters"][$i] = $thisChapter;
            }
            return $res;
        }
    }

    /**
     * @param Request $request
     * @return bool|int
     */
    public function createLong(Request $request)
    {
        $longArr = json_decode($request["long"], true);

        $long = new longs();
        $long->long_title = $longArr["long_title"];
        $long->description = $longArr["description"];
        $long->save();
        return $long->id;
    }

    /**
     * @param Request $request
     * @return bool|int
     */
    public function createChapter(Request $request)
    {
        $chapArr = json_decode($request["chapter"], true);
        if(DB::table("longs")->find($chapArr["long_id"]) == null) return false;
        $count = count(DB::table("chapters")
            ->where("long_id", $chapArr["long_id"])
            ->get()
            ->toArray());
        $chapter = new chapters();
        $chapter->long_id = $chapArr["long_id"];
        $chapter->chapter_title = $chapArr["chapter_title"];
        $chapter->order = ++$count;
        $chapter->save();
        return $chapter->id;
    }

    /**
     * @param Request $request
     * @return bool|int
     */
    public function createArticle(Request $request)
    {
        $articleArr = json_decode($request["article"], true);
        if($request->file("file") == null
            || !$request->file("file")->isValid())
            abort(403, "请上传正确文件");
        $mdFilepath = $request->file("file")->store("public/postHtml");

        $article = new articles();

        $article->title= $articleArr["title"];
        $article->src = $mdFilepath;

        $article->is_long = $articleArr["is_long"];
        if($articleArr["is_long"])
        {
            $article->chapter_id = $articleArr["chapter_id"];
            $count = count(articles::query()
                ->where("chapter_id", $articleArr["chapter_id"])
                ->get()
                ->toArray());
            $article->chapter_order = ++$count;
        }

        $article->agrees = 0;
        $article->description = $articleArr["description"];
        $article->save();

        $countTags = count($articleArr["tags"]);
        for($i = 1; $i <= $countTags; ++$i)
        {
            $tag = tags::query()
                ->where("name", $articleArr["tags"]["tag".$i])
                ->get()
                ->toArray();
            if($tag == [])
            {
                $tag = new tags();
                $tag->name = $articleArr["tags"]["tag".$i];
                $tag->save();
                $tagId = $tag->id;
            }
            else $tagId = $tag[0]["id"];

            $rel = new article_tag_relation();
            $rel->article_id = $article->id;
            $rel->tag_id = $tagId;
            $rel->save();
        }
        return $article->id;
    }

    /**
     * @param $longId
     * @return bool
     */
    public function deleteLong($longId){
        $sql = longs::query()
            ->where("id", $longId);
        if($sql->get()->toArray() == []) abort("404", "delete failed: not exist");

        $sql->delete();
        if($sql->exists()) abort("500", "failed");
        return true;
    }

    /**
     * @param $chapId
     * @return bool
     */
    public function deleteChapter($chapId){
        $sql = chapters::query()
            ->where("id", $chapId);
        if($sql->get()->toArray() == []) abort("404", "delete failed: not exist");
        $sql->delete();
        if($sql->exists()) abort("500", "failed");
        return true;
    }

    /**
     * @param $articleId
     * @return bool
     */
    public function deleteArticle($articleId){
        $article = articles::query()
            ->where("id", $articleId);
        $articleArr = $article->get()->toArray();

        //删除与文件相关的
        $htmlPath = $articleArr[0]["src"];
        deleteFile($htmlPath);

        //删除与标签相关的
        $rel = article_tag_relation::query()
            ->where("article_id", $articleId);
        $relArr = $rel->get()->toArray();
        $relCounts = count($relArr);

        for($i = 0; $i < $relCounts; ++$i){
            $tagId = $relArr[$i]["tag_id"];

            $tag = article_tag_relation::query()
                ->where("tag_id", $tagId)
                ->where("article_id", $articleId);
            $tag->delete();
            if($tag->exists()) abort("500", "failed");

            //如果没有其他文章再有这个标签了，那么就删掉这个标签
            $tagCount = article_tag_relation::query()
                ->where("tag_id", $tagId)
                ->count();
            if($tagCount == 0){
                $tag = tags::query()
                    ->where("id", $tagId);
                $tag->delete();
                if($tag->exists()) abort("500", "failed");
            }
        }
        $article->delete();
        return true;
    }
}
