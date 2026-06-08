@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Add Education</h1>
    <p class="mt-2 text-slate-400">Add a new education record.</p>

    <form method="POST" action="{{ route('admin.education.store') }}" class="mt-8 space-y-6">
        @csrf

        @include('admin.education.partials.form', ['education' => null])

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Save Education
        </button>
    </form>
</div>

@endsection