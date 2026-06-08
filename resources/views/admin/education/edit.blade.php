@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">
    <h1 class="text-4xl font-bold">Edit Education</h1>
    <p class="mt-2 text-slate-400">Update education record.</p>

    <form method="POST" action="{{ route('admin.education.update', $education) }}" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        @include('admin.education.partials.form', ['education' => $education])

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Update Education
        </button>
    </form>
</div>

@endsection