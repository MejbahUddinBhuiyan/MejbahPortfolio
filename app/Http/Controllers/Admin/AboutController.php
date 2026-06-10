<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Support\CloudinaryUploader;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        $data = $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'experience' => 'nullable|string|max:100',
            'projects_completed' => 'nullable|string|max:100',
            'research_interest' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
           $data['photo'] = CloudinaryUploader::upload(
           $request->file('photo'),
           'portfolio/about'
          );
        }

        if ($request->hasFile('resume')) {
              $data['resume'] = CloudinaryUploader::upload(
              $request->file('resume'),
              'portfolio/about-resume'
             );
        }

        About::updateOrCreate(['id' => 1], $data);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About section updated successfully.');
    }
}