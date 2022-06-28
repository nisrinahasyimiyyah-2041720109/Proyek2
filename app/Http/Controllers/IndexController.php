<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('index', [
            'category' => $category 
        ]);
    }

}
