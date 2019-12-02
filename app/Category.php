<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    //
    protected $table = "categorys";

    public static function getCategory() {
        $categorys = DB::table('categorys')->orderBy('name','DESC')->get();
        foreach($categorys as $category) {
            $category->quantily = DB::table('projects')
                                    ->groupBy('idCategory')
                                    ->having('idCategory', $category->id)
                                    ->count();
        }
        return $categorys;
    }
}
