@extends('layouts.admin')

@section('content')

<h1 class="mb-8 text-5xl font-bold text-white">
    Add Certificate
</h1>

<form method="POST"
      enctype="multipart/form-data"
      action="{{ route('admin.certificates.store') }}">

    @csrf

    @include('admin.certificates.form')

    <button
        class="mt-8 rounded-2xl bg-sky-500 px-8 py-4 font-semibold text-black">
        Save Certificate
    </button>

</form>

@endsection