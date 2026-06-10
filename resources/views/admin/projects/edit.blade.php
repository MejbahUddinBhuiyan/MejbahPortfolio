@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">Edit Project</h1>
    <p class="mt-2 text-slate-400">Update project details before showing it on homepage.</p>

    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Description</label>
            <textarea name="description" rows="5"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Category</label>
                <input type="text" name="category" value="{{ old('category', $project->category) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Tech Stack</label>
                <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                       placeholder="Laravel, MySQL, Tailwind CSS"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Live URL</label>
                <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Project Image</label>

            @if($project->image)
                <img src="{{ $project->image }}"
                     class="mt-3 h-32 w-48 rounded-xl border border-white/10 object-cover">
            @endif

            <input type="file" name="image" accept="image/*"
                   class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_featured" value="1"
                   @checked(old('is_featured', $project->is_featured))
                   class="rounded border-white/10 bg-white/5">
            <span class="text-slate-300">Show this project on homepage</span>
        </label>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Project
        </button>
    </form>
</div>

@endsection