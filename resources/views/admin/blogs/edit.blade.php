@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">Edit Blog</h1>
    <p class="mt-2 text-slate-400">Update blog post information.</p>

    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Category</label>
                <input type="text" name="category" value="{{ old('category', $blog->category) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Status</label>
                <select name="status"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
                    <option value="draft" @selected(old('status', $blog->status) === 'draft')>Draft</option>
                    <option value="published" @selected(old('status', $blog->status) === 'published')>Published</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Excerpt</label>
            <textarea name="excerpt" rows="3"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('excerpt', $blog->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Content</label>
            <textarea name="content" rows="8"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Featured Image</label>

                @if($blog->featured_image)
                    <img src="{{ $blog->featured_image }}"
                         class="mt-3 h-32 w-48 rounded-xl border border-white/10 object-cover">
                @endif

                <input type="file" name="featured_image" accept="image/*"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Published Date</label>
                <input type="datetime-local" name="published_at"
                       value="{{ old('published_at', $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d\TH:i') : '') }}"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Blog
        </button>
    </form>
</div>

@endsection