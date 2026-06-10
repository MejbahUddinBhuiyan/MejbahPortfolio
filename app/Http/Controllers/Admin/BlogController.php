<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Support\CloudinaryUploader;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required',
            'published_at' => 'nullable',
        ]);

        $data['slug'] = \Str::slug($request->title);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = CloudinaryUploader::upload(
                $request->file('featured_image'),
                '        portfolio/blogs'
            );
        }

        Blog::create($data);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required',
            'published_at' => 'nullable',
        ]);

        $data['slug'] = \Str::slug($request->title);

        if ($request->hasFile('featured_image')) {

            $data['featured_image'] = CloudinaryUploader::upload(
                $request->file('featured_image'),
                'portfolio/blogs'
            );
        }

        $blog->update($data);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

         return back()->with('success', 'Blog deleted successfully.');
    }
}