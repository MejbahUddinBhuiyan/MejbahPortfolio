@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">About Section</h1>
    <p class="mt-2 text-slate-400">Manage your public about section information.</p>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Heading</label>
            <input type="text" name="heading" value="{{ old('heading', $about->heading ?? '') }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Description</label>
            <textarea name="description" rows="6"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('description', $about->description ?? '') }}</textarea>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <div>
                <label class="block text-sm font-medium text-slate-300">Experience</label>
                <input type="text" name="experience" value="{{ old('experience', $about->experience ?? '') }}"
                       placeholder="Example: 2+ Years"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Projects Completed</label>
                <input type="text" name="projects_completed" value="{{ old('projects_completed', $about->projects_completed ?? '') }}"
                       placeholder="Example: 15+"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Research Interest</label>
                <input type="text" name="research_interest" value="{{ old('research_interest', $about->research_interest ?? '') }}"
                       placeholder="AI, ML, Web"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">About Photo</label>

                @if (!empty($about?->photo))
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $about->photo) }}"
                             class="h-32 w-32 rounded-2xl border border-white/10 object-cover">
                    </div>
                @endif

                <input type="file" name="photo" accept="image/*"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Resume</label>

                @if (!empty($about?->resume))
                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $about->resume) }}" target="_blank"
                           class="inline-flex rounded-xl border border-sky-400/30 bg-sky-400/10 px-4 py-2 text-sm font-semibold text-sky-300">
                            View Current Resume
                        </a>
                    </div>
                @endif

                <input type="file" name="resume" accept=".pdf,.doc,.docx"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950">
            </div>
        </div>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Save About
        </button>
    </form>
</div>

@endsection