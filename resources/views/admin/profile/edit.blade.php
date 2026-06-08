@extends('layouts.admin')

@section('content')

<div class="max-w-5xl">
    <h1 class="text-4xl font-bold">Edit Profile</h1>
    <p class="mt-2 text-slate-400">Manage your public portfolio profile information.</p>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-300">Name</label>
            <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Title</label>
            <input type="text" name="title" value="{{ old('title', $profile->title ?? '') }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Bio</label>
            <textarea name="bio" rows="5"
                      class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('bio', $profile->bio ?? '') }}</textarea>
            @error('bio') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
                @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                       class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
                @error('phone') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300">Location</label>
            <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                   class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
            @error('location') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-300">Profile Image</label>

                @if (!empty($profile?->profile_image))
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $profile->profile_image) }}"
                             alt="Profile Image"
                             class="h-32 w-32 rounded-2xl object-cover border border-white/10">
                    </div>
                @endif

                <input type="file" name="profile_image" accept="image/*"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950 hover:file:bg-sky-300">
                <p class="mt-1 text-xs text-slate-500">Allowed: JPG, PNG, WEBP. Max size: 2MB.</p>
                @error('profile_image') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300">Resume / CV</label>

                @if (!empty($profile?->cv_file))
                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $profile->cv_file) }}" target="_blank"
                           class="inline-flex rounded-xl border border-sky-400/30 bg-sky-400/10 px-4 py-2 text-sm font-semibold text-sky-300 hover:bg-sky-400/20">
                            View Current CV
                        </a>
                    </div>
                @endif

                <input type="file" name="cv_file" accept=".pdf,.doc,.docx"
                       class="mt-3 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-slate-300 outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-sky-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950 hover:file:bg-sky-300">
                <p class="mt-1 text-xs text-slate-500">Allowed: PDF, DOC, DOCX. Max size: 5MB.</p>
                @error('cv_file') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_available" value="1"
                   @checked(old('is_available', $profile->is_available ?? true))
                   class="rounded border-white/10 bg-white/5">
            <span class="text-slate-300">Available for Research & Software Projects</span>
        </label>

        <button type="submit"
                class="rounded-xl bg-sky-400 px-6 py-3 font-semibold text-slate-950 hover:bg-sky-300">
            Save Profile
        </button>
    </form>
</div>

@endsection