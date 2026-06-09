@extends('layouts.admin')

@section('content')

<div class="max-w-7xl">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-5xl font-bold text-white">
                Projects
            </h1>

            <p class="mt-3 text-slate-400">
                Manage portfolio projects and GitHub repositories.
            </p>
        </div>

        <form action="{{ route('admin.projects.syncGithub') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
                Sync GitHub
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mt-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mt-6 rounded-xl bg-red-500/10 border border-red-500/20 px-4 py-3 text-red-300">
            {{ session('error') }}
        </div>
    @endif

    <div class="mt-8 overflow-hidden rounded-3xl border border-white/10">

        <table class="w-full">

            <thead class="bg-white/5">
                <tr>
                    <th class="px-6 py-4 text-left">Project</th>
                    <th class="px-6 py-4 text-left">Category</th>
                    <th class="px-6 py-4 text-left">Featured</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($projects as $project)

                    <tr class="border-t border-white/10">

                        <td class="px-6 py-4">
                            {{ $project->title }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->category }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->is_featured ? 'Yes' : 'No' }}
                        </td>

                        <td class="px-6 py-4 flex gap-3">

                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="rounded-lg bg-sky-500 px-4 py-2 text-white">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.projects.destroy', $project) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-lg bg-red-500 px-4 py-2 text-white">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                            No projects found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection