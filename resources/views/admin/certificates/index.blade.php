@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-5xl font-bold text-white">Certificates</h1>
            <p class="mt-3 text-xl text-slate-400">
                Manage certifications and achievements.
            </p>
        </div>

        <a href="{{ route('admin.certificates.create') }}"
           class="rounded-2xl bg-sky-500 px-8 py-4 text-xl font-semibold text-black hover:bg-sky-400">
            Add Certificate
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 p-6 text-emerald-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-800">
        <table class="w-full">
            <thead class="bg-slate-900">
                <tr>
                    <th class="px-8 py-6 text-left text-white">Image</th>
                    <th class="px-8 py-6 text-left text-white">Title</th>
                    <th class="px-8 py-6 text-left text-white">Issuer</th>
                    <th class="px-8 py-6 text-left text-white">Issue Date</th>
                    <th class="px-8 py-6 text-right text-white">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($certificates as $certificate)

                <tr class="border-t border-slate-800">

                    <td class="px-8 py-6">
                        @if($certificate->image)
                            <img src="{{ $certificate->image }}"
                                 class="h-16 w-24 rounded-lg object-cover">
                        @endif
                    </td>

                    <td class="px-8 py-6 text-white">
                        {{ $certificate->title }}
                    </td>

                    <td class="px-8 py-6 text-slate-300">
                        {{ $certificate->issuer }}
                    </td>

                    <td class="px-8 py-6 text-slate-300">
                        {{ $certificate->issue_date }}
                    </td>

                    <td class="px-8 py-6">
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('admin.certificates.edit',$certificate) }}"
                               class="rounded-xl bg-blue-900 px-5 py-3 text-blue-300">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.certificates.destroy',$certificate) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete certificate?')"
                                    class="rounded-xl bg-red-900 px-5 py-3 text-red-300">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5"
                        class="py-12 text-center text-slate-400">
                        No certificates added yet.
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection