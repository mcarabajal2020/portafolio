<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CarabajalDev')</title>
    <meta name="description" content="@yield('description', 'CarabajalDev — Desarrollo web, soluciones digitales y blog técnico.')">
    <link rel="icon" href="{{ asset('images/logo-mark.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <meta name="theme-color" content="#0ea5e9">
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-primary-600 focus:px-4 focus:py-2 focus:text-white">
        Saltar al contenido
    </a>

    <header class="sticky top-0 z-40 border-b border-gray-200/80 bg-white/90 backdrop-blur dark:border-gray-800 dark:bg-gray-950/90">
        <div class="container-page flex h-16 items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/logo-mark.png') }}" alt="CarabajalDev" class="h-10 w-10">
                <span class="hidden text-sm font-bold tracking-tight text-gray-900 sm:inline dark:text-white">CarabajalDev</span>
            </a>

            <nav class="hidden items-center gap-1 md:flex">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Inicio</a>
                <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'nav-link-active' : '' }}">Portfolio</a>
                <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'nav-link-active' : '' }}">Blog</a>
                <a href="{{ route('contact.form') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'nav-link-active' : '' }}">Contacto</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="{{ route('blog.index') }}" class="btn-primary hidden sm:inline-flex">Leer el blog</a>
                <button type="button" id="theme-toggle" class="btn-secondary !px-3" aria-label="Cambiar tema">
                    <svg class="h-4 w-4 dark:hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75 9.75 9.75 0 0 1 8.25 6c0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25 9.75 9.75 0 0 0 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                    <svg class="hidden h-4 w-4 dark:block" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
                <button type="button" id="mobile-menu-btn" class="btn-secondary !px-3 md:hidden" aria-label="Abrir menú" aria-expanded="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden border-t border-gray-200 bg-white md:hidden dark:border-gray-800 dark:bg-gray-950">
            <nav class="container-page flex flex-col gap-1 py-4">
                <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                <a href="{{ route('portfolio') }}" class="nav-link">Portfolio</a>
                <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
                <a href="{{ route('contact.form') }}" class="nav-link">Contacto</a>
            </nav>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
        <div class="container-page py-12">
            <div class="grid gap-10 md:grid-cols-3">
                <div>
                    <img src="{{ asset('images/logo.png') }}" alt="CarabajalDev" class="h-16 w-auto">
                    <p class="mt-4 max-w-sm text-sm text-gray-500 dark:text-gray-400">
                        Sitio institucional, portfolio y blog de desarrollo web. Soluciones digitales a medida.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900 dark:text-white">Navegación</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a class="text-gray-500 transition hover:text-primary-600 dark:text-gray-400" href="{{ route('home') }}">Inicio</a></li>
                        <li><a class="text-gray-500 transition hover:text-primary-600 dark:text-gray-400" href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li><a class="text-gray-500 transition hover:text-primary-600 dark:text-gray-400" href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a class="text-gray-500 transition hover:text-primary-600 dark:text-gray-400" href="{{ route('contact.form') }}">Contacto</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900 dark:text-white">Redes</h3>
                    <ul class="mt-4 flex flex-wrap gap-3">
                        <li>
                            <a href="https://www.instagram.com/alejandromaximilianocarabajal/" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 transition hover:border-primary-300 hover:text-primary-600 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" aria-label="Instagram">
                                <img src="{{ asset('images/instagram.svg') }}" alt="" class="h-4 w-4">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/alejandromaximiliano.carabajal" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 transition hover:border-primary-300 hover:text-primary-600 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" aria-label="Facebook">
                                <img src="{{ asset('images/facebook.png') }}" alt="" class="h-4 w-4">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Maxi_carabajal" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 transition hover:border-primary-300 hover:text-primary-600 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" aria-label="X">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.727-8.835L1.254 2.25H8.08l4.253 5.622L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-10 border-t border-gray-200 pt-6 text-center text-sm text-gray-400 dark:border-gray-800">
                © {{ date('Y') }} CarabajalDev. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <script>
        (function () {
            var root = document.documentElement;
            var storage = null;
            try {
                storage = window.localStorage;
                storage.getItem('theme');
            } catch (e) {
                storage = null;
            }

            var toggle = document.getElementById('theme-toggle');
            if (toggle) {
                toggle.addEventListener('click', function () {
                    var dark = root.classList.toggle('dark');
                    if (storage) {
                        try {
                            storage.setItem('theme', dark ? 'dark' : 'light');
                        } catch (e) {}
                    }
                });
            }

            var btn = document.getElementById('mobile-menu-btn');
            var menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', function () {
                    var open = menu.classList.toggle('hidden') === false;
                    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                });
            }
        })();
    </script>
</body>
</html>
