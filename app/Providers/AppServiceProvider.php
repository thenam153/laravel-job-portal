<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Project;
use App\Fk_file_project;
use App\Fk_skill_user;
use App\RequestTable;
use App\Skill;
use App\User;
use App\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $populars = DB::table('projects')
        ->orderBy('created_at','DESC')
        ->limit(6)
        ->get();
        foreach($populars as $project) {
            $category = Category::find($project->idCategory);
            $project->nameCategory = $category->name;
            $project->contentCategory = $category->content;
            $project->skills = json_decode($project->skills);
            if(!is_array($project->skills)) $project->skills = [];
            $files = DB::table('files')
            ->where('idProject', $project->id)
            ->get();
            $project->files = array();
            foreach($files as $file) {
                
                $project->files[] = $file->content;
            }
            $project->nameCategory = Category::find($project->idCategory)->name;
        }
        View::share('populars', $populars);

        $count = count(Project::all());
        View::share('count', $count);

    }
}
