@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Add Social Link</h1>
    <p class="mt-2 text-slate-400">Add a new social media platform link.</p>

    <form method="POST" action="{{ route('admin.socials.store') }}" class="mt-8 space-y-6">
        @csrf

        <div>
            <label class="mb-2 block font-medium">Platform</label>
            <input type="text" name="platform" placeholder="GitHub"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">URL</label>
            <input type="url" name="url" placeholder="https://..."
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">Icon</label>
            <input type="text" name="icon" placeholder="github, linkedin, facebook"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <div>
            <label class="mb-2 block font-medium">Sort Order</label>
            <input type="number" name="sort_order" value="0"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white">
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1" checked>
            <span>Active</span>
        </label>

        <button class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950">
            Save Social Link
        </button>
    </form>
</div>

@endsection