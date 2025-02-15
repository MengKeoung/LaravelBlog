<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Fetch all categories from database
        return view('addblog', compact('categories')); // Pass categories to the view
    }

    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);

        // Create new blog post and assign attributes
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->content = $request->content;

        // Set 'post_by' to the currently authenticated user's name
        if (auth()->check()) {
            $blog->post_by = auth()->user()->name;
        }

        // Save the blog post
        $blog->save();

        // Redirect back with a success message
        return redirect()->route('home')->with('status', 'Blog post created successfully!');
    }

    public function index()
    {
        $blogs = Blog::where('post_by', auth()->user()->name)->paginate(5); // Correct pagination
        return view('home', compact('blogs')); // Pass $blogs to the 'home' view
    }
    public function edit($id)
    {
        // Fetch the blog by its ID
        $blog = Blog::findOrFail($id);  // This will throw a 404 error if the blog is not found

        // Fetch all categories for the dropdown (assuming a Category model exists)
        $categories = Category::all();

        // Return the edit view with the blog and categories
        return view('editblog', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',

        ]);

        // Find the blog post to update
        $blog = Blog::findOrFail($id);

        // Update the blog post with the new data
        $blog->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
        ]);

        // Redirect after update
        return redirect()->route('home')->with('status', 'Blog post updated successfully!');
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('home')->with('status', 'Blog post deleted successfully!');
    }
    public function allblog()
{
    // Fetch paginated blogs (5 per page)
    $blogs = Blog::paginate(10);

    // Pass the blogs variable to the view
    return view('allblog', compact('blogs'));
}
    
}
