@extends('layouts.admin')

@section('content')

<div>
    <h1 class="text-4xl font-bold">Contact Messages</h1>
    <p class="mt-2 text-slate-400">Read and manage messages submitted from the contact form.</p>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-8 overflow-hidden rounded-2xl border border-white/10">
        <table class="w-full text-left">
            <thead class="bg-white/5 text-slate-300">
                <tr>
                    <th class="px-5 py-4">Name</th>
                    <th class="px-5 py-4">Email</th>
                    <th class="px-5 py-4">Subject</th>
                    <th class="px-5 py-4">Status</th>
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse ($contacts as $contact)
                    <tr class="{{ $contact->is_read ? 'text-slate-400' : 'text-white font-semibold' }}">
                        <td class="px-5 py-4">{{ $contact->name }}</td>
                        <td class="px-5 py-4">{{ $contact->email }}</td>
                        <td class="px-5 py-4">{{ $contact->subject }}</td>

                        <td class="px-5 py-4">
                            @if($contact->is_read)
                                <span class="rounded-full bg-slate-700 px-3 py-1 text-xs text-slate-300">
                                    Read
                                </span>
                            @else
                                <span class="rounded-full bg-sky-400/10 px-3 py-1 text-xs text-sky-300">
                                    New
                                </span>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="rounded-lg bg-sky-400/10 px-3 py-2 text-sm text-sky-300 hover:bg-sky-400/20">
                                    View
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.contacts.destroy', $contact) }}"
                                      onsubmit="return confirm('Delete this message?')">
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
                            No contact messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection