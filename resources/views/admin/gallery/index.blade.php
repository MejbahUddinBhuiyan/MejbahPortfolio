@extends('layouts.admin')

@section('content')

<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold">Gallery</h1>
            <p class="mt-2 text-slate-400">Manage portfolio gallery images.</p>
        </div>

        <a href="{{ route('admin.gallery.create') }}"
           class="rounded-xl bg-sky-400 px-5 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Add Image
        </a>
    </div>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($galleries as $gallery)
            <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5">
                <img src="{{ $gallery->image }}"
                     alt="{{ $gallery->title }}"
                     class="h-56 w-full object-cover">

                <div class="p-5">
                    <p class="text-sm text-sky-400">
                        {{ $gallery->category }}
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-white">
                        {{ $gallery->title ?? 'Gallery Image' }}
                    </h3>

                    @if($gallery->caption)
                        <p class="mt-3 line-clamp-2 text-sm text-slate-400">
                            {{ $gallery->caption }}
                        </p>
                    @endif

                    <p class="mt-3 text-sm text-slate-500">
                        Order: {{ $gallery->sort_order }}
                    </p>

                    <div class="mt-5 flex gap-3">
                        <a href="{{ route('admin.gallery.edit', $gallery) }}"
                           class="rounded-lg bg-sky-400/10 px-3 py-2 text-sm text-sky-300 hover:bg-sky-400/20">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}"
                              onsubmit="return confirm('Delete this image?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="rounded-lg bg-red-500/10 px-3 py-2 text-sm text-red-300 hover:bg-red-500/20">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-2xl border border-white/10 p-8 text-center text-slate-400">
                No gallery images added yet.
            </div>
        @endforelse
    </div>
</div>

@endsection