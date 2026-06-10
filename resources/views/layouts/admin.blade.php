<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Mejbah Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6">
            <h2 class="text-2xl font-bold text-sky-400">
                Admin Panel
            </h2>

            <nav class="mt-8 space-y-3">

               <a href="/administrator" class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Dashboard
                </a>

                <a href="{{ route('admin.profile.edit') }}" class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Profile
                </a>
                <a href="{{ route('admin.about.edit') }}" class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    About
                </a>
                <a href="{{ route('admin.education.index') }}"
                   class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Education
                </a>

                <a href="{{ route('admin.skills.index') }}"
                class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Skills
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   class="block rounded-lg px-4 py-2 hover:bg-slate-800
                   {{ request()->routeIs('admin.projects.*') ? 'bg-slate-800 text-sky-400' : '' }}">
                    Projects
                </a>
                <a href="{{ route('admin.research.index') }}"
                   class="block rounded-lg px-4 py-2 hover:bg-slate-800
                   {{ request()->routeIs('admin.research.*') ? 'bg-slate-800 text-sky-400' : '' }}">
                    Research
                </a>

                <a href="#" class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Publications
                </a>

                <a href="{{ route('admin.blogs.index') }}"
                     class="block rounded-lg px-4 py-2 hover:bg-slate-800
                     {{ request()->routeIs('admin.blogs.*') ? 'bg-slate-800 text-sky-400' : '' }}">
                      Blogs
                </a>

                <a href="{{ route('admin.gallery.index') }}"
                    class="block rounded-lg px-4 py-2 hover:bg-slate-800
                    {{ request()->routeIs('admin.gallery.*') ? 'bg-slate-800 text-sky-400' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                   class="block rounded-lg px-4 py-2 hover:bg-slate-800">
                    Contacts
                </a>
                <a href="{{ route('admin.socials.index') }}"
                   class="block rounded-lg px-4 py-2 hover:bg-slate-800
                   {{ request()->routeIs('admin.socials.*') ? 'bg-slate-800 text-sky-400' : '' }}">
                    Social Media
                </a>                

            </nav>
            <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="mt-10 w-full rounded-lg bg-red-600 px-4 py-2 text-white hover:bg-red-700">
        Logout
    </button>
</form>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>

</body>
</html>