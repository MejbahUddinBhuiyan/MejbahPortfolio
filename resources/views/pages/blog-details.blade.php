@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-950 text-white">
    <div class="mx-auto max-w-4xl px-6 py-28">

        <a href="/#blog" class="text-sky-400 hover:text-sky-300">
            ← Back to Blog
        </a>

        @if($blog->featured_image)
            <img src="{{ asset('storage/' . $blog->featured_image) }}"
                 alt="{{ $blog->title }}"
                 class="mt-8 h-80 w-full rounded-3xl object-cover">
        @endif

        <div class="mt-8">
            <span class="text-sm text-sky-400">
                {{ $blog->category ?? 'Article' }}
            </span>

            <h1 class="mt-4 text-4xl font-bold md:text-6xl">
                {{ $blog->title }}
            </h1>

            <p class="mt-4 text-sm text-slate-500">
                {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') : '' }}
            </p>

            <div class="mt-10 space-y-6 text-lg leading-8 text-slate-300">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </div>

    </div>
</div>

@endsection