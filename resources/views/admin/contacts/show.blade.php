@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <a href="{{ route('admin.contacts.index') }}"
       class="text-sky-400 hover:text-sky-300">
        ← Back to Messages
    </a>

    <div class="mt-6 rounded-3xl border border-white/10 bg-white/5 p-8">
        <h1 class="text-3xl font-bold text-white">
            {{ $contact->subject }}
        </h1>

        <div class="mt-6 space-y-4 text-slate-300">
            <p>
                <span class="font-semibold text-sky-400">Name:</span>
                {{ $contact->name }}
            </p>

            <p>
                <span class="font-semibold text-sky-400">Email:</span>
                {{ $contact->email }}
            </p>

            <p>
                <span class="font-semibold text-sky-400">Received:</span>
                {{ $contact->created_at->format('M d, Y h:i A') }}
            </p>
        </div>

        <div class="mt-8 rounded-2xl border border-white/10 bg-slate-950/60 p-6">
            <p class="whitespace-pre-line text-slate-300">
                {{ $contact->message }}
            </p>
        </div>

        <form method="POST"
              action="{{ route('admin.contacts.destroy', $contact) }}"
              onsubmit="return confirm('Delete this message?')"
              class="mt-8">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="rounded-xl bg-red-500 px-5 py-3 font-semibold text-white hover:bg-red-600">
                Delete Message
            </button>
        </form>
    </div>
</div>

@endsection