@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Edit Gallery Image</h1>

    <form method="POST"
          action="{{ route('admin.gallery.update', $gallery) }}"
          enctype="multipart/form-data"
          class="mt-8 space-y-6">

        @csrf
        @method('PUT')

        <div>
            <label class="mb-2 block font-medium">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $gallery->title) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Category</label>
            <input type="text"
                   name="category"
                   value="{{ old('category', $gallery->category) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Caption</label>
            <textarea name="caption"
                      rows="4"
                      class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">{{ old('caption', $gallery->caption) }}</textarea>
        </div>

        <div>
            <label class="mb-2 block font-medium">Sort Order</label>
            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', $gallery->sort_order) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Current Image</label>

            <img src="{{ $gallery->image }}"
                 class="mb-4 h-40 rounded-xl object-cover">
        </div>

        <div>
            <label class="mb-2 block font-medium">Replace Image</label>
            <input type="file"
                   name="image"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Image
        </button>

    </form>
</div>

@endsection