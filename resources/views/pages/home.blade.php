@extends('layouts.app')

@section('content')

<div class="relative min-h-screen overflow-hidden bg-slate-950">
    {{-- Background blur orbs --}}
    <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full bg-sky-500/20 blur-3xl"></div>
    <div class="absolute top-40 -right-32 h-96 w-96 rounded-full bg-violet-500/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-cyan-500/10 blur-3xl"></div>

    {{-- Navbar --}}
    <header class="fixed left-0 right-0 top-0 z-50 px-6 py-5">
        <nav class="mx-auto flex max-w-7xl items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-5 py-3 backdrop-blur-xl">
            <a href="/" class="font-display text-lg font-bold tracking-wide">
                <span class="gradient-text">Mejbah</span>
            </a>

            <div class="hidden items-center gap-7 text-sm font-medium text-slate-300 md:flex">
                <a href="#home" class="transition hover:text-sky-400">Home</a>
                <a href="#about" class="transition hover:text-sky-400">About</a>
                <a href="#projects" class="transition hover:text-sky-400">Projects</a>
                <a href="#research" class="transition hover:text-sky-400">Research</a>
                <a href="#publications" class="transition hover:text-sky-400">Publications</a>
                <a href="#blog" class="transition hover:text-sky-400">Blog</a>
                <a href="#gallery" class="transition hover:text-sky-400">Gallery</a>
                <a href="#contact" class="transition hover:text-sky-400">Contact</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="https://github.com/MejbahUddinBhuiyan" target="_blank"
                   class="rounded-full border border-white/10 px-3 py-2 text-xs font-bold text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400">
                    GitHub
                </a>

                <a href="https://www.linkedin.com/in/mejbah-uddin-bhuiyan-79b9b6249/" target="_blank"
                   class="rounded-full border border-white/10 px-3 py-2 text-xs font-bold text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400">
                    LinkedIn
                </a>

                <button class="rounded-full border border-white/10 p-2 text-slate-300 transition hover:border-sky-400/50 hover:text-sky-400">
                    <i data-lucide="moon" class="h-4 w-4"></i>
                </button>
            </div>
        </nav>
    </header>

    {{-- Hero --}}
    <main id="home" class="relative z-10 mx-auto flex min-h-screen max-w-7xl items-center px-6 pt-28">
        <div class="grid w-full items-center gap-12 lg:grid-cols-2">
            <div>
                <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-5 py-3 text-sm font-medium text-emerald-300">
                    <span class="relative flex h-3 w-3">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-3 w-3 rounded-full bg-emerald-400"></span>
                    </span>

                    Available for Research & Software Projects
                </div>

                <p class="mb-4 text-lg text-slate-400">Hello, I'm</p>

                <h1 class="font-display text-5xl font-extrabold leading-tight md:text-7xl">
                    Mejbah Uddin
                    <span class="gradient-text block">Bhuiyan</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-400">
                    Computer Science and Engineering undergraduate, student researcher,
                    Laravel developer, AI/ML enthusiast, and programming problem solver.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#" class="rounded-full bg-sky-400 px-6 py-3 font-semibold text-slate-950 shadow-lg shadow-sky-400/20 transition hover:-translate-y-1 hover:bg-sky-300">
                        Download CV
                    </a>

                    <a href="#projects" class="rounded-full border border-white/10 bg-white/5 px-6 py-3 font-semibold text-slate-100 backdrop-blur-xl transition hover:-translate-y-1 hover:border-sky-400/50 hover:text-sky-400">
                        View Projects
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
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
                           class="glass-card rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 transition hover:-translate-y-1 hover:border-sky-400/50 hover:text-sky-400">
                            {{ $social['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="relative -mt-[15.5rem]">
                <div class="glass-card rounded-[2rem] p-6">
                    <div class="rounded-[1.5rem] border border-white/10 bg-gradient-to-br from-sky-400/20 to-violet-500/20 p-8">
                        <div class="mx-auto flex h-72 w-72 items-center justify-center rounded-full border border-white/10 bg-white/10 text-center backdrop-blur-xl">
                            <div>
                                <i data-lucide="user" class="mx-auto mb-4 h-16 w-16 text-sky-300"></i>
                                <p class="font-display text-2xl font-bold">Profile Image</p>
                                <p class="mt-2 text-sm text-slate-400">We will add your photo here</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card absolute -bottom-8 -left-6 rounded-3xl p-5">
                    <p class="text-sm text-slate-400">Currently</p>
                    <p class="mt-1 font-semibold text-slate-100">Building Laravel Projects</p>
                </div>

                <div class="glass-card absolute -right-4 -top-8 rounded-3xl p-5">
                    <p class="text-sm text-slate-400">Focus</p>
                    <p class="mt-1 font-semibold text-slate-100">AI • Research • Web</p>
                </div>
            </div>
        </div>
    </main>

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