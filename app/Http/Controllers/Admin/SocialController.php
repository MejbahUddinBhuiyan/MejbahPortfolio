<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::orderBy('sort_order')->get();

        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|max:255',
            'url' => 'required|url',
        ]);

        Social::create([
            'platform' => $request->platform,
            'url' => $request->url,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link added successfully.');
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    public function update(Request $request, Social $social)
    {
        $request->validate([
            'platform' => 'required|max:255',
            'url' => 'required|url',
        ]);

        $social->update([
            'platform' => $request->platform,
            'url' => $request->url,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function destroy(Social $social)
    {
        $social->delete();

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link deleted successfully.');
    }
}