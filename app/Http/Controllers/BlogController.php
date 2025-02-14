<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class BlogController extends Controller
{
    public function create()
    {
        return view('create-blog'); // Example view
        $categories = Category::all(); 
        return view('create-blog', compact('categories'));
    }

    public function store(Request $request)
    {
        // Logic to store blog post
    }
    
}
