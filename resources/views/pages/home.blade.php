@extends('layouts.app')

@section('content')

<div class="relative min-h-screen overflow-hidden bg-slate-950">
    {{-- Background blur orbs --}}
    <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full bg-sky-500/20 blur-3xl"></div>
    <div class="absolute top-40 -right-32 h-96 w-96 rounded-full bg-violet-500/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-cyan-500/10 blur-3xl"></div>

    {{-- Navbar --}}
    <header class="fixed left-0 right-0 top-0 z-50 px-4 py-4 sm:px-6 sm:py-5">
        <nav class="mx-auto flex max-w-7xl items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-3 backdrop-blur-xl sm:px-5">
            <a href="/" class="font-display text-lg font-bold tracking-wide">
                <span class="gradient-text">Mejbah</span>
            </a>

            <div class="hidden items-center gap-5 text-sm font-medium text-slate-300 lg:flex xl:gap-7">
                <a href="#home" class="transition hover:text-sky-400">Home</a>
                <a href="#about" class="transition hover:text-sky-400">About</a>
                <a href="#education" class="transition hover:text-sky-400">Education</a>
                <a href="#skills" class="transition hover:text-sky-400">Skills</a>
                <a href="#projects" class="transition hover:text-sky-400">Projects</a>
                <a href="#research" class="transition hover:text-sky-400">Research</a>
                <a href="#publications" class="transition hover:text-sky-400">Publications</a>
                <a href="#blog" class="transition hover:text-sky-400">Blog</a>
                <a href="#gallery" class="transition hover:text-sky-400">Gallery</a>
                <a href="#contact" class="transition hover:text-sky-400">Contact</a>
            </div>

            <div class="flex items-center gap-2 sm:gap-3">
                <a href="https://github.com/MejbahUddinBhuiyan" target="_blank"
                   class="hidden rounded-full border border-white/10 px-3 py-2 text-xs font-bold text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400 sm:inline-flex">
                    GitHub
                </a>

                <a href="https://www.linkedin.com/in/mejbah-uddin-bhuiyan-79b9b6249/" target="_blank"
                   class="hidden rounded-full border border-white/10 px-3 py-2 text-xs font-bold text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400 sm:inline-flex">
                    LinkedIn
                </a>

                <button class="rounded-full border border-white/10 p-2 text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400">
                    <i data-lucide="moon" class="h-4 w-4"></i>
                </button>

<button id="mobile-menu-button" type="button"
        class="rounded-full border border-white/10 p-2 text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400 lg:hidden">
    <i data-lucide="menu" class="h-4 w-4"></i>
</button>
            </div>
        </nav>
        <div id="mobile-menu" class="mx-auto mt-3 hidden max-w-7xl rounded-2xl border border-white/10 bg-slate-950/90 p-4 backdrop-blur-xl lg:hidden">
    <div class="grid gap-3 text-sm font-medium text-slate-300">
        <a href="#home" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Home</a>
        <a href="#about" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">About</a>
        <a href="#education" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Education</a>
        <a href="#skills" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Skills</a>
        <a href="#projects" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Projects</a>
        <a href="#research" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Research</a>
        <a href="#publications" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Publications</a>
        <a href="#blog" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Blog</a>
        <a href="#gallery" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Gallery</a>
        <a href="#contact" class="rounded-xl px-4 py-2 transition hover:bg-white/5 hover:text-sky-400">Contact</a>
    </div>
</div>
    </header>

    {{-- Hero --}}
    <main id="home" class="relative z-10 mx-auto flex max-w-7xl items-center px-4 pb-10 pt-36 sm:px-6 lg:min-h-[760px] lg:pt-36">
        <div class="grid w-full items-center gap-16 lg:grid-cols-2 lg:gap-12">
            <div class="text-center lg:text-left">
                <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-xs font-medium text-emerald-300 sm:px-5 sm:text-sm">
                    <span class="relative flex h-3 w-3 shrink-0">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-3 w-3 rounded-full bg-emerald-400"></span>
                    </span>

                    <span>@if ($profile?->is_available)
                             Available for Research & Software Projects
                          @else
                             Currently Not Available
                          @endif
                    </span>
                </div>

                <p class="mb-4 text-base text-slate-400 sm:text-lg">Hello, I'm</p>

                <h1 class="font-display text-4xl font-extrabold leading-tight sm:text-5xl md:text-6xl lg:text-7xl">
                    Mejbah Uddin
                    <span class="gradient-text block">Bhuiyan</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-400 sm:text-lg lg:mx-0">
                   {{ $profile->bio ?? 'Computer Science and Engineering undergraduate, student researcher, Laravel developer, AI/ML enthusiast, and programming problem solver.' }}
                </p>

                <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:justify-center lg:justify-start">
                    <a href="{{ $profile?->cv_file ? asset('storage/' . $profile->cv_file) : '#' }}"
                       target="{{ $profile?->cv_file ? '_blank' : '_self' }}"
                       class="rounded-full bg-sky-400 px-6 py-3 text-center font-semibold text-slate-950 shadow-lg shadow-sky-400/20 transition hover:-translate-y-1 hover:bg-sky-300">
                        Download CV
                    </a>

                    <a href="#projects" class="rounded-full border border-white/10 bg-white/5 px-6 py-3 text-center font-semibold text-slate-100 backdrop-blur-xl transition hover:-translate-y-1 hover:border-sky-400/50 hover:text-sky-400">
                        View Projects
                    </a>
                </div>
            </div>

           <div class="relative order-first mx-auto w-full max-w-md lg:order-none lg:mx-0 lg:max-w-none lg:-mt-[9.5rem]">
                <div class="glass-card rounded-[2rem] p-4 sm:p-6">
                    <div class="rounded-[1.5rem] border border-white/10 bg-gradient-to-br from-sky-400/20 to-violet-500/20 p-6 sm:p-8">
                        <div class="mx-auto flex h-56 w-56 items-center justify-center rounded-full border border-white/10 bg-white/10 text-center backdrop-blur-xl sm:h-72 sm:w-72">
                            <div>
                                @if ($profile?->profile_image)
                                <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                     alt="Mejbah Uddin Bhuiyan"
                                     class="h-full w-full rounded-full object-cover">
                                @else
                                    <div>
                                        <i data-lucide="user" class="mx-auto mb-4 h-12 w-12 text-sky-300 sm:h-16 sm:w-16"></i>
                                        <p class="font-display text-xl font-bold sm:text-2xl">Profile Image</p>
                                        <p class="mt-2 text-xs text-slate-400 sm:text-sm">We will add your photo here</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card absolute -bottom-6 left-2 rounded-3xl p-4 sm:-bottom-8 sm:-left-6 sm:p-5">
                    <p class="text-xs text-slate-400 sm:text-sm">Currently</p>
                    <p class="mt-1 text-sm font-semibold text-slate-100 sm:text-base">Building Laravel Projects</p>
                </div>

                <div class="glass-card absolute -right-2 -top-6 rounded-3xl p-4 sm:-right-4 sm:-top-8 sm:p-5">
                    <p class="text-xs text-slate-400 sm:text-sm">Focus</p>
                    <p class="mt-1 text-sm font-semibold text-slate-100 sm:text-base">AI • Research • Web</p>
                </div>
            </div>
        </div>
    </main>
{{-- About Section --}}
<section id="about" class="relative z-10 pb-16 pt-8 lg:pb-20 lg:pt-10">
    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
            <span class="rounded-full border border-sky-400/20 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                About Me
            </span>

            <h2 class="mt-6 text-4xl font-bold text-white md:text-5xl">
                {{ $about->heading ?? 'About Me' }}
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-slate-400">
                A brief overview of my academic, research and development journey.
            </p>
        </div>

        <div class="grid items-center gap-10 lg:grid-cols-2">
            <div class="glass-card rounded-[2rem] p-4 sm:p-6">
                <div class="rounded-[1.5rem] border border-white/10 bg-gradient-to-br from-sky-400/20 to-violet-500/20 p-6 sm:p-8">
                    @if ($about?->photo)
                        <img src="{{ asset('storage/' . $about->photo) }}"
                             alt="About Mejbah"
                             class="h-80 w-full rounded-[1.5rem] object-cover">
                    @else
                        <div class="flex h-80 items-center justify-center rounded-[1.5rem] bg-white/10 text-center">
                            <div>
                                <i data-lucide="user-round" class="mx-auto mb-4 h-14 w-14 text-sky-300"></i>
                                <p class="text-xl font-bold text-white">About Photo</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <p class="text-lg leading-8 text-slate-400">
                    {{ $about->description ?? 'Computer Science and Engineering undergraduate with interest in Laravel, AI, research, web development and problem solving.' }}
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                    <div class="glass-card rounded-2xl p-5 text-center">
                        <p class="text-3xl font-bold text-sky-400">
                            {{ $about->experience ?? '2+' }}
                        </p>
                        <p class="mt-2 text-sm text-slate-400">Experience</p>
                    </div>

                    <div class="glass-card rounded-2xl p-5 text-center">
                        <p class="text-3xl font-bold text-sky-400">
                            {{ $about->projects_completed ?? '15+' }}
                        </p>
                        <p class="mt-2 text-sm text-slate-400">Projects</p>
                    </div>

                    <div class="glass-card rounded-2xl p-5 text-center">
                        <p class="text-lg font-bold text-sky-400">
                            {{ $about->research_interest ?? 'AI, ML, Web' }}
                        </p>
                        <p class="mt-2 text-sm text-slate-400">Research Interest</p>
                    </div>
                </div>

                @if ($about?->resume)
                    <a href="{{ asset('storage/' . $about->resume) }}"
                       target="_blank"
                       class="mt-8 inline-flex rounded-full bg-sky-400 px-6 py-3 font-semibold text-slate-950 shadow-lg shadow-sky-400/20 transition hover:-translate-y-1 hover:bg-sky-300">
                        Download Resume
                    </a>
                @endif
            </div>
        </div>

    </div>
</section>    
{{-- Education Section --}}
<section id="education" class="relative z-10 pb-16 pt-8 lg:pb-20 lg:pt-10">
    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
            <span class="rounded-full border border-sky-400/20 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                Academic Background
            </span>

            <h2 class="mt-6 text-4xl font-bold text-white md:text-5xl">
                Education
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-slate-400">
                My academic journey and educational achievements.
            </p>
        </div>

<div class="relative mx-auto max-w-5xl">

    <div class="absolute left-4 top-0 h-full w-px bg-gradient-to-b from-sky-400 via-violet-500 to-transparent md:left-1/2"></div>

    @forelse($educations as $index => $education)

        <div class="relative mb-10
            {{ $index % 2 == 0
                ? 'pl-10 md:w-1/2 md:pl-0 md:pr-10'
                : 'pl-10 md:ml-auto md:w-1/2 md:pl-10'
            }}">

            <div class="glass-card rounded-3xl p-6">

                <span class="text-sm {{ $index % 2 == 0 ? 'text-sky-400' : 'text-violet-400' }}">
                    {{ $education->year }}
                </span>

                <h3 class="mt-2 text-2xl font-bold text-white">
                    {{ $education->degree }}
                </h3>

                <p class="mt-2 text-slate-300">
                    {{ $education->institution }}
                </p>

                @if($education->description)
                    <p class="mt-4 text-slate-400">
                        {{ $education->description }}
                    </p>
                @endif

            </div>

            <div class="absolute left-2 top-8 h-4 w-4 rounded-full
                {{ $index % 2 == 0
                    ? 'bg-sky-400 shadow-lg shadow-sky-400/50 md:left-auto md:right-[-8px]'
                    : 'bg-violet-400 shadow-lg shadow-violet-400/50 md:left-[-8px]'
                }}">
            </div>

        </div>

    @empty

        <div class="text-center text-slate-500">
            No education records found.
        </div>

    @endforelse

</div>

    </div>
</section>
{{-- Skills Section --}}
<section id="skills" class="relative z-10 pb-16 pt-2 lg:pb-20 lg:pt-4">
    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
            <span class="rounded-full border border-sky-400/20 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                Technical Expertise
            </span>

            <h2 class="mt-6 text-4xl font-bold text-white md:text-5xl">
                Skills
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-slate-400">
                Technologies, programming languages and tools I work with.
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse($skills as $skill)

                <div class="glass-card rounded-3xl p-6">

                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">
                            {{ $skill->name }}
                        </h3>

                        <span class="text-sm font-semibold text-sky-400">
                            {{ $skill->percentage }}%
                        </span>
                    </div>

                    <p class="mt-2 text-sm text-slate-400">
                        {{ $skill->category }}
                    </p>

                    <div class="mt-5 h-3 overflow-hidden rounded-full bg-white/10">
                        <div
                            class="h-full rounded-full bg-gradient-to-r from-sky-400 to-violet-500"
                            style="width: {{ $skill->percentage }}%">
                        </div>
                    </div>

                </div>

            @empty

                <div class="col-span-full text-center text-slate-500">
                    No skills available.
                </div>

            @endforelse

        </div>

    </div>
</section>
{{-- Projects Section --}}
<section id="projects" class="relative z-10 pb-16 pt-8 lg:pb-20 lg:pt-10">
    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
            <span class="rounded-full border border-sky-400/20 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                Featured Work
            </span>

            <h2 class="mt-6 text-4xl font-bold text-white md:text-5xl">
                Projects
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-slate-400">
                Selected projects from my GitHub and development work.
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse($projects as $project)

                <div class="glass-card overflow-hidden rounded-3xl">

                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"
                             alt="{{ $project->title }}"
                             class="h-52 w-full object-cover">
                    @else
                        <div class="flex h-52 items-center justify-center bg-gradient-to-br from-sky-400/20 to-violet-500/20">
                            <i data-lucide="folder-code" class="h-14 w-14 text-sky-300"></i>
                        </div>
                    @endif

                    <div class="p-6">
                        <span class="text-sm text-sky-400">
                            {{ $project->category ?? 'Project' }}
                        </span>

                        <h3 class="mt-2 text-2xl font-bold text-white">
                            {{ $project->title }}
                        </h3>

                        <p class="mt-4 line-clamp-3 text-slate-400">
                            {{ $project->description ?? 'GitHub project synced from repository.' }}
                        </p>

                        @if($project->tech_stack)
                            <p class="mt-4 text-sm text-slate-300">
                                {{ $project->tech_stack }}
                            </p>
                        @endif

                        <div class="mt-6 flex flex-wrap gap-3">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank"
                                   class="rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400">
                                    GitHub
                                </a>
                            @endif

                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank"
                                   class="rounded-full bg-sky-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-sky-300">
                                    Live Demo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            @empty

                <div class="col-span-full text-center text-slate-500">
                    No featured projects selected yet.
                </div>

            @endforelse

        </div>

    </div>
</section>
{{-- Social Media Section --}}
<section id="social" class="relative z-10 pb-20 pt-8">
    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-10 text-center">
            <span class="rounded-full border border-sky-400/20 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                Connect With Me
            </span>

            <h2 class="mt-6 text-4xl font-bold text-white md:text-5xl">
                Social Platforms
            </h2>
        </div>

        <div class="mx-auto grid max-w-5xl grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
            @php
                $socials = [
                    ['label' => 'GitHub', 'url' => 'https://github.com/MejbahUddinBhuiyan'],
                    ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/mejbah-uddin-bhuiyan-79b9b6249/'],
                    ['label' => 'ResearchGate', 'url' => 'https://www.researchgate.net/profile/Mejbah-Bhuiyan-2'],
                    ['label' => 'Codeforces', 'url' => 'https://codeforces.com/profile/mejbah09'],
                    ['label' => 'LeetCode', 'url' => 'https://leetcode.com/u/mejbah09/'],
                    ['label' => 'HackerRank', 'url' => 'https://www.hackerrank.com/profile/mejbahu475'],
                    ['label' => 'Facebook', 'url' => 'https://www.facebook.com/Mejbah.Moushom666/'],
                    ['label' => 'Instagram', 'url' => 'https://www.instagram.com/__wiz_zard__/'],
                ];
            @endphp

            @foreach ($socials as $social)
                <a href="{{ $social['url'] }}" target="_blank"
                   class="glass-card rounded-2xl px-5 py-4 text-center text-sm font-semibold text-slate-300 transition hover:-translate-y-1 hover:border-sky-400/50 hover:text-sky-400">
                    {{ $social['label'] }}
                </a>
            @endforeach
        </div>

    </div>
</section>
    {{-- Footer --}}
    <footer class="relative z-10 border-t border-white/10 bg-slate-950/50 backdrop-blur-xl">
        <div class="mx-auto max-w-7xl px-6 py-8">
            <div class="text-center text-sm text-slate-500">
                © {{ date('Y') }} Mejbah Uddin Bhuiyan. All Rights Reserved.
            </div>
        </div>
    </footer>
</div>

@endsection