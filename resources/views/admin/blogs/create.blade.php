@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">Add Blog</h1>
    <p class="mt-2 text-slate-400">Create a new blog post or article.</p>

    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-300">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Category</label>
                <input type="text" name="category" value="{{ old('category') }}"
                       placeholder="Laravel, AI, Research..."
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Status</label>
                <select name="status"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Excerpt</label>
            <textarea name="excerpt" rows="3"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Content</label>
            <textarea name="content" rows="8"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('content') }}</textarea>
            @error('content') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Published Date</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Save Blog
        </button>
    </form>
</div>

@endsection