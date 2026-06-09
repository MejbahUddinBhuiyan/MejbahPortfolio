@extends('layouts.admin')

@section('content')

<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold">Research</h1>
            <p class="mt-2 text-slate-400">Manage research works and academic projects.</p>
        </div>

        <a href="{{ route('admin.research.create') }}"
           class="rounded-xl bg-sky-400 px-5 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Add Research
        </a>
    </div>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-8 overflow-hidden rounded-2xl border border-white/10">
        <table class="w-full text-left">
            <thead class="bg-white/5 text-slate-300">
                <tr>
                    <th class="px-5 py-4">Title</th>
                    <th class="px-5 py-4">Category</th>
                    <th class="px-5 py-4">Status</th>
                    <th class="px-5 py-4">Featured</th>
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse ($researches as $research)
                    <tr class="text-slate-300">
                        <td class="px-5 py-4 font-semibold text-white">
                            {{ $research->title }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $research->category }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $research->status }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $research->is_featured ? 'Yes' : 'No' }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.research.edit', $research) }}"
                                   class="rounded-lg bg-sky-400/10 px-3 py-2 text-sm text-sky-300 hover:bg-sky-400/20">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.research.destroy', $research) }}"
                                      onsubmit="return confirm('Delete this research item?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="rounded-lg bg-red-500/10 px-3 py-2 text-sm text-red-300 hover:bg-red-500/20">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-8 text-center text-slate-400">
                            No research added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection