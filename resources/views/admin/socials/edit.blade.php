@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Edit Social Link</h1>

    <form method="POST" action="{{ route('admin.socials.update', $social) }}" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-2 block font-medium">Platform</label>
            <input type="text" name="platform" value="{{ old('platform', $social->platform) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">URL</label>
            <input type="url" name="url" value="{{ old('url', $social->url) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">Icon</label>
            <input type="text" name="icon" value="{{ old('icon', $social->icon) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $social->sort_order) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1" @checked($social->is_active)>
            <span>Active</span>
        </label>

        <button class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950">
            Update Social Link
        </button>
    </form>
</div>

@endsection