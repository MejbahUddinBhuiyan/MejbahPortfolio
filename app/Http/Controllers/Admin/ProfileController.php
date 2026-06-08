<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cv_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'is_available' => 'nullable|boolean',
        ]);

        $data['is_available'] = $request->has('is_available');

        if ($request->hasFile('profile_image')) {
            if ($profile && $profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($request->hasFile('cv_file')) {
            if ($profile && $profile->cv_file) {
                Storage::disk('public')->delete($profile->cv_file);
            }

            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }

        Profile::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}