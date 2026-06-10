<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'image' => 'required|image|max:2048',
        ]);

        $cloudinary = new \Cloudinary\Cloudinary(config('cloudinary.cloud_url'));

        $result = $cloudinary->uploadApi()->upload(
            $request->file('image')->getRealPath(),
            [
                'folder' => 'portfolio/gallery'
            ]
        );

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'caption' => $request->caption,
            'sort_order' => $request->sort_order ?? 0,
            'image' => $result['secure_url'],
        ]);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery image added successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'title',
            'category',
            'caption',
            'sort_order'
        ]);

        if ($request->hasFile('image')) {

            $cloudinary = new \Cloudinary\Cloudinary(config('cloudinary.cloud_url'));

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'portfolio/gallery'
                ]
            );

            $data['image'] = $result['secure_url'];
        }

        $gallery->update($data);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully.');
    }
}