<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Support\CloudinaryUploader;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'tech_stack' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryUploader::upload(
                $request->file('image'),
                'portfolio/projects'
            );
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function syncGithub()
    {
        $username = 'MejbahUddinBhuiyan';

        $response = Http::get("https://api.github.com/users/{$username}/repos", [
            'sort' => 'updated',
            'per_page' => 100,
        ]);

        if (!$response->successful()) {
            return redirect()
                ->route('admin.projects.index')
                ->with('error', 'GitHub sync failed. Please try again.');
        }

        foreach ($response->json() as $repo) {
            Project::updateOrCreate(
                ['github_url' => $repo['html_url']],
                [
                    'title' => $repo['name'],
                    'slug' => Str::slug($repo['name']),
                    'description' => $repo['description'],
                    'category' => $repo['language'],
                    'tech_stack' => $repo['language'],
                    'live_url' => $repo['homepage'],
                    'is_github_synced' => true,
                ]
            );
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'GitHub repositories synced successfully.');
    }
}