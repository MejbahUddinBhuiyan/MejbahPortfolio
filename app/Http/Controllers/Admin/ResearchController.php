<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use App\Support\CloudinaryUploader;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::orderBy('sort_order')->latest()->get();

        return view('admin.research.index', compact('researches'));
    }

    public function create()
    {
        return view('admin.research.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'collaborators' => 'nullable|string|max:255',
            'publication_link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryUploader::upload(
                $request->file('image'),
                'portfolio/research'
            );
        }

        Research::create($data);

        return redirect()
            ->route('admin.research.index')
            ->with('success', 'Research added successfully.');
    }

    public function edit(Research $research)
    {
        return view('admin.research.edit', compact('research'));
    }

    public function update(Request $request, Research $research)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'collaborators' => 'nullable|string|max:255',
            'publication_link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryUploader::upload(
                $request->file('image'),
                'portfolio/research'
            );
        }

        $research->update($data);

        return redirect()
            ->route('admin.research.index')
            ->with('success', 'Research updated successfully.');
    }

    public function destroy(Research $research)
    {
    $research->delete();

    return redirect()
        ->route('admin.research.index')
        ->with('success', 'Research deleted successfully.');
    }
}