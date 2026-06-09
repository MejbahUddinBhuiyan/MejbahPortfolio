<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            if ($about && $about->photo) {
                Storage::disk('public')->delete($about->photo);
            }

            $data['photo'] = $request->file('photo')->store('about', 'public');
        }

        if ($request->hasFile('resume')) {
            if ($about && $about->resume) {
                Storage::disk('public')->delete($about->resume);
            }

            $data['resume'] = $request->file('resume')->store('resume', 'public');
        }

        About::updateOrCreate(['id' => 1], $data);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About section updated successfully.');
    }
}