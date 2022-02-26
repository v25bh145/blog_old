<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function viewAll($page){
        if($page < 1) return null;

        $allTags = DB::table("tags")
            ->get()
            ->toArray();

        $res = getAmount(10, $allTags, $page);

        if($page == 1)
            $res['tagsAmount'] = DB::table('tags')->count();
        if(!$res) return null;
        else return json_encode($res);
    }
}
