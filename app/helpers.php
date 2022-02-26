<?php

use Illuminate\Support\Facades\Storage;

/**
 * @param $perPage
 * @param $allArray
 * @param $page
 * @return bool|array
 */
function getAmount($perPage, $allArray, $page)
{
    if($page < 1) return false;

    $i = $perPage * ($page - 1);
    $allAmount = count($allArray);
    $resArray = null;

    if($i >= $allAmount) return false;
    else{
        for(; $i != $allAmount && $i < $perPage * $page; ++$i)
            $resArray[$i - $perPage * ($page - 1)] = $allArray[$i];
        if($resArray == null) return false;
        return $resArray;
    }
}
function articleAssign($articles, $i)
{
    $thisArticle = Array(
        "id" => $articles[$i]['id'],
        "created_at" => $articles[$i]['created_at'],
        "updated_at" => $articles[$i]['updated_at'],
        "title" => $articles[$i]['title'],
        "src" => $articles[$i]['src'],
        "agrees" => $articles[$i]['agrees'],
        //"image_src" => $articles[$i]['image_src'],
        "description" => $articles[$i]['description'],

        "is_long" => $articles[$i]['is_long'],
        "chapter_id" => $articles[$i]['chapter_id'],
        "chapter_order" => $articles[$i]['chapter_order']
    );
    /*
    $thisArticle["id"] = $articles[$i]->id;
    $thisArticle["created_at"] = $articles[$i]->created_at;
    $thisArticle["updated_at"] = $articles[$i]->updated_at;
    $thisArticle["title"] = $articles[$i]->title;
    $thisArticle["src"] = $articles[$i]->src;
    $thisArticle["agrees"] = $articles[$i]->agrees;
    $thisArticle["image_src"] = $articles[$i]->image_src;
    $thisArticle["description"] = $articles[$i]->description;

    $thisArticle["is_long"] = $articles[$i]->is_long;
    $thisArticle["chapter_id"] = $articles[$i]->chapter_id;
    $thisArticle["chapter_order"] = $articles[$i]->chapter_order;
    */
    return $thisArticle;
}
function chapterAssign($chapters, $i)
{
    $thisChapter = Array(
        "id" => $chapters[$i]['id'],
        "created_at" => $chapters[$i]['created_at'],
        "updated_at" => $chapters[$i]['updated_at'],
        "chapter_title" => $chapters[$i]['chapter_title'],
        "long_id" => $chapters[$i]['long_id']
    );
    /*
    $thisChapter["id"] = $chapters[$i]['id'];
    $thisChapter["created_at"] = $chapters[$i]['created_at'];
    $thisChapter["updated_at"] = $chapters[$i]['updated_at'];
    $thisChapter["chapter_title"] = $chapters[$i]['chapter_title'];
    $thisChapter["long_id"] = $chapters[$i]['long_id'];
    */
    return $thisChapter;
}
function longAssign($longs, $i)
{
    $thisLong = Array(
        "id" => $longs[$i]['id'],
        "created_at" => $longs[$i]['created_at'],
        "updated_at" => $longs[$i]['updated_at'],
        "long_title" => $longs[$i]['long_title'],
        //"image_src" => $longs[$i]['image_src'],
        "description" => $longs[$i]['description']
    );
    return $thisLong;
}
function deleteFile($filePath){
    //dump("filePath: ".$filePath);
    Storage::delete($filePath);
}
