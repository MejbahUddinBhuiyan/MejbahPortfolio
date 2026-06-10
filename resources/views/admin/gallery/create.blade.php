@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Add Gallery Image</h1>
    <p class="mt-2 text-slate-400">
        Upload a new image to your portfolio gallery.
    </p>

    <form method="POST"
          action="{{ route('admin.gallery.store') }}"
          enctype="multipart/form-data"
          class="mt-8 space-y-6">

        @csrf

        <div>
            <label class="mb-2 block font-medium">Title</label>
            <input type="text"
                   name="title"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Category</label>
            <input type="text"
                   name="category"
                   placeholder="Research, Event, Award, Development"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Caption</label>
            <textarea name="caption"
                      rows="4"
                      class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3"></textarea>
        </div>

        <div>
            <label class="mb-2 block font-medium">Sort Order</label>
            <input type="number"
                   name="sort_order"
                   value="0"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <div>
            <label class="mb-2 block font-medium">Image</label>
            <input type="file"
                   name="image"
                   required
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3">
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Save Image
        </button>

    </form>
</div>

@endsection