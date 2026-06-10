@extends('layouts.admin')

@section('content')

<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold">Social Media</h1>
            <p class="mt-2 text-slate-400">
                Manage social platform links.
            </p>
        </div>

        <a href="{{ route('admin.socials.create') }}"
           class="rounded-xl bg-sky-500 px-5 py-3 font-medium text-black">
            Add Social
        </a>
    </div>

    @if(session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-8 overflow-hidden rounded-2xl border border-white/10">
        <table class="w-full">
            <thead class="bg-white/5">
                <tr>
                    <th class="px-5 py-4 text-left">Platform</th>
                    <th class="px-5 py-4 text-left">URL</th>
                    <th class="px-5 py-4 text-left">Status</th>
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($socials as $social)
                    <tr class="border-t border-white/10">
                        <td class="px-5 py-4">{{ $social->platform }}</td>

                        <td class="px-5 py-4 text-slate-400">
                            {{ Str::limit($social->url, 50) }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $social->is_active ? 'Active' : 'Inactive' }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-3">

                                <a href="{{ route('admin.socials.edit', $social) }}"
                                   class="rounded-lg bg-sky-500 px-3 py-2 text-black">
                                    Edit
                                </a>

                                <form action="{{ route('admin.socials.destroy', $social) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete social link?')"
                                        class="rounded-lg bg-red-500 px-3 py-2 text-white">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"
                            class="px-5 py-10 text-center text-slate-400">
                            No social links added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection