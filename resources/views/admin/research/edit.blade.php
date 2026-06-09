@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">Edit Research</h1>
    <p class="mt-2 text-slate-400">Update research work information.</p>

    <form method="POST" action="{{ route('admin.research.update', $research) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Title</label>
            <input type="text" name="title" value="{{ old('title', $research->title) }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Category</label>
                <input type="text" name="category" value="{{ old('category', $research->category) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Status</label>
                <select name="status"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
                    <option value="Ongoing" @selected(old('status', $research->status) === 'Ongoing')>Ongoing</option>
                    <option value="Completed" @selected(old('status', $research->status) === 'Completed')>Completed</option>
                    <option value="Published" @selected(old('status', $research->status) === 'Published')>Published</option>
                    <option value="Under Review" @selected(old('status', $research->status) === 'Under Review')>Under Review</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Description</label>
            <textarea name="description" rows="5"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('description', $research->description) }}</textarea>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Institution</label>
                <input type="text" name="institution" value="{{ old('institution', $research->institution) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Collaborators</label>
                <input type="text" name="collaborators" value="{{ old('collaborators', $research->collaborators) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Publication Link</label>
            <input type="url" name="publication_link" value="{{ old('publication_link', $research->publication_link) }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Research Image</label>

                @if($research->image)
                    <img src="{{ asset('storage/' . $research->image) }}"
                         class="mt-3 h-32 w-48 rounded-xl border border-white/10 object-cover">
                @endif

                <input type="file" name="image" accept="image/*"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $research->sort_order) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_featured" value="1"
                   @checked(old('is_featured', $research->is_featured))
                   class="rounded border-white/10 bg-white/5">
            <span class="text-slate-300">Show this research on homepage</span>
        </label>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Research
        </button>
    </form>
</div>

@endsection