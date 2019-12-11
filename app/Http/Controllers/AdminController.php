<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
	{
    	$this->middleware('admin');
      date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        return view('admin.index');
    }
    public function getProject()
    {
        return view('admin.project');
    }
    public function getCategory()
    {
        return view('admin.category');
    }
    public function getUser()
    {
        return view('admin.user');
    }
    public function getComment()
    {
        return view('admin.comment');
    }
    public function getExtension()
    {
        return view('admin.extension');
    }
}
