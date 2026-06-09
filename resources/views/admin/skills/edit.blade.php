@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Edit Skill</h1>
    <p class="mt-2 text-slate-400">Update this skill information.</p>

    <form method="POST" action="{{ route('admin.skills.update', $skill) }}" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Skill Name</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Category</label>
                <input type="text" name="category" value="{{ old('category', $skill->category) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Percentage</label>
                <input type="number" name="percentage" min="0" max="100" value="{{ old('percentage', $skill->percentage) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Icon</label>
                <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Skill
        </button>
    </form>
</div>

@endsection