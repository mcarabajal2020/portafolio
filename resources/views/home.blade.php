@extends('layouts.app')

@section('title', 'CarabajalDev — Desarrollo web y soluciones digitales')
@section('description', 'CarabajalDev construye sitios web modernos, paneles administrativos y soluciones digitales a medida.')

@section('content')
<section class="relative overflow-hidden border-b border-gray-100 dark:border-gray-900">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary-50/80 via-white to-white dark:from-primary-950/30 dark:via-gray-950 dark:to-gray-950"></div>
    <div class="container-page grid items-center gap-12 py-20 lg:grid-cols-2 lg:py-28">
        <div>
            <span class="inline-flex items-center gap-2 rounded-full border border-primary-200 bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-700 dark:border-primary-800 dark:bg-primary-950 dark:text-primary-300">
                Desarrollo web profesional
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl dark:text-white">
                Soluciones digitales claras, rápidas y a medida
            </h1>
            <p class="mt-5 max-w-xl text-lg text-gray-500 dark:text-gray-400">
                Diseñamos y desarrollamos sitios institucionales, blogs y paneles administrativos con Laravel y Filament. Código limpio, diseño moderno y resultados medibles.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('portfolio') }}" class="btn-primary">Ver portfolio</a>
                <a href="{{ route('contact.form') }}" class="btn-secondary">Hablemos</a>
            </div>
        </div>

        <div class="relative mx-auto w-full max-w-md reveal">
            <div class="animate-glow absolute -inset-4 rounded-[2rem] bg-gradient-to-tr from-primary-400/25 to-sky-400/25 blur-2xl"></div>
            <div class="animate-float-slow">
                <div class="card relative p-8 text-center">
                    <img src="{{ asset('images/avatar.png') }}" alt="CarabajalDev" class="mx-auto h-40 w-40 rounded-2xl object-cover shadow-lg">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">CarabajalDev</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Desarrollador web · Laravel · Filament · UX</p>
                    <div class="mt-6 grid grid-cols-3 gap-3 text-center">
                        <div class="rounded-xl bg-gray-50 p-3 transition duration-300 hover:scale-110 hover:bg-primary-50 hover:shadow-lg dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="text-lg font-bold text-primary-600">Laravel</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Backend</div>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-3 transition duration-300 hover:scale-110 hover:bg-primary-50 hover:shadow-lg dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="text-lg font-bold text-primary-600">Filament</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Admin</div>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-3 transition duration-300 hover:scale-110 hover:bg-primary-50 hover:shadow-lg dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="text-lg font-bold text-primary-600">UI</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Diseño</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20">
    <div class="container-page">
        <div class="max-w-2xl reveal">
            <h2 class="section-title">Servicios</h2>
            <p class="section-subtitle">Todo lo que necesitás para tener una presencia digital sólida.</p>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <article class="card-hover group reveal overflow-hidden p-0" style="transition-delay: 0ms">
                <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-sky-50 dark:from-primary-950/50 dark:via-gray-900 dark:to-gray-900">
                    <svg viewBox="0 0 144 96" class="animate-float h-24 w-auto transition-transform duration-500 group-hover:scale-110" fill="none" aria-hidden="true">
                        <rect x="14" y="6" width="116" height="84" rx="10" class="fill-white stroke-gray-200 dark:fill-gray-950 dark:stroke-gray-700" stroke-width="2"/>
                        <path d="M14 26h116" class="stroke-gray-200 dark:stroke-gray-700" stroke-width="2"/>
                        <circle cx="26" cy="16" r="3.5" fill="#f87171"/>
                        <circle cx="38" cy="16" r="3.5" fill="#fbbf24"/>
                        <circle cx="50" cy="16" r="3.5" fill="#34d399"/>
                        <rect x="28" y="38" width="30" height="7" rx="3.5" fill="#10b981"/>
                        <rect x="64" y="38" width="22" height="7" rx="3.5" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="36" y="53" width="46" height="7" rx="3.5" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="36" y="68" width="28" height="7" rx="3.5" class="fill-gray-300 dark:fill-gray-600"/>
                        <path d="m100 45 11 8-11 8" stroke="#059669" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Desarrollo a medida</h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sitios institucionales, e-commerce y aplicaciones web con arquitectura limpia y mantenible.</p>
                </div>
            </article>

            <article class="card-hover group reveal overflow-hidden p-0" style="transition-delay: 120ms">
                <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-sky-50 dark:from-primary-950/50 dark:via-gray-900 dark:to-gray-900">
                    <svg viewBox="0 0 144 96" class="animate-float h-24 w-auto transition-transform duration-500 group-hover:scale-110" fill="none" aria-hidden="true">
                        <rect x="14" y="6" width="116" height="84" rx="10" class="fill-white stroke-gray-200 dark:fill-gray-950 dark:stroke-gray-700" stroke-width="2"/>
                        <path d="M46 6v84" class="stroke-gray-200 dark:stroke-gray-700" stroke-width="2"/>
                        <rect x="22" y="18" width="16" height="7" rx="3.5" fill="#10b981"/>
                        <rect x="22" y="33" width="16" height="7" rx="3.5" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="22" y="48" width="16" height="7" rx="3.5" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="22" y="63" width="16" height="7" rx="3.5" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="58" y="18" width="34" height="8" rx="4" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="58" y="66" width="10" height="14" rx="3" fill="#6ee7b7"/>
                        <rect x="74" y="54" width="10" height="26" rx="3" fill="#10b981"/>
                        <rect x="90" y="44" width="10" height="36" rx="3" fill="#059669"/>
                        <rect x="108" y="36" width="14" height="44" rx="4" class="fill-gray-100 dark:fill-gray-800"/>
                        <rect x="112" y="44" width="6" height="6" rx="2" fill="#10b981"/>
                        <rect x="112" y="56" width="6" height="6" rx="2" class="fill-gray-300 dark:fill-gray-600"/>
                        <rect x="112" y="68" width="6" height="6" rx="2" class="fill-gray-300 dark:fill-gray-600"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5" /></svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Paneles administrativos</h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Back-ends potentes con Filament 5: CRUD, roles, reportes y una interfaz que se siente nativa.</p>
                </div>
            </article>

            <article class="card-hover group reveal overflow-hidden p-0" style="transition-delay: 240ms">
                <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-sky-50 dark:from-primary-950/50 dark:via-gray-900 dark:to-gray-900">
                    <svg viewBox="0 0 144 96" class="animate-float h-24 w-auto transition-transform duration-500 group-hover:scale-110" fill="none" aria-hidden="true">
                        <rect x="26" y="14" width="92" height="68" rx="8" class="fill-white stroke-gray-200 dark:fill-gray-950 dark:stroke-gray-700" stroke-width="2"/>
                        <rect x="38" y="26" width="34" height="8" rx="4" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="38" y="42" width="68" height="26" rx="6" class="fill-gray-100 dark:fill-gray-800"/>
                        <rect x="46" y="50" width="24" height="10" rx="5" fill="#10b981"/>
                        <rect x="76" y="50" width="22" height="10" rx="5" class="fill-gray-300 dark:fill-gray-700"/>
                        <rect x="38" y="72" width="20" height="4" rx="2" class="fill-gray-200 dark:fill-gray-700"/>
                        <rect x="22" y="10" width="8" height="8" rx="2" fill="#10b981"/>
                        <rect x="114" y="10" width="8" height="8" rx="2" fill="#10b981"/>
                        <rect x="22" y="78" width="8" height="8" rx="2" fill="#10b981"/>
                        <rect x="114" y="78" width="8" height="8" rx="2" fill="#10b981"/>
                        <circle cx="112" cy="30" r="7" fill="#38bdf8"/>
                        <path d="M84 58 100 64l-6.5 2.5L91 73l-7-15Z" fill="#059669" stroke="#ffffff" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" /></svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Diseño UI/UX</h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Interfaces claras, accesibles y modernas pensadas para convertir y facilitar el trabajo diario.</p>
                </div>
            </article>
        </div>
    </div>
</section>

@if($featuredPosts->isNotEmpty())
<section class="border-y border-gray-100 bg-gray-50 py-16 dark:border-gray-900 dark:bg-gray-900/40 sm:py-20">
    <div class="container-page">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="section-title">Destacados del blog</h2>
                <p class="section-subtitle">Artículos seleccionados para empezar.</p>
            </div>
            <a href="{{ route('blog.index') }}" class="btn-secondary">Ver todos</a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach($featuredPosts as $post)
            <article class="card-hover overflow-hidden">
                @if($post->featured_url)
                <img src="{{ $post->featured_url }}" alt="{{ $post->title }}" class="h-40 w-full object-cover">
                @endif
                <div class="p-5">
                    @if($post->category)
                    <span class="text-xs font-semibold uppercase tracking-wide text-primary-600 dark:text-primary-400">{{ $post->category->name }}</span>
                    @endif
                    <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                        <a href="{{ route('blog.show', $post) }}" class="hover:text-primary-600 dark:hover:text-primary-400">{{ $post->title }}</a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">{!! strip_tags($post->content) !!}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-16 sm:py-20">
    <div class="container-page">
        <div class="max-w-2xl">
            <h2 class="section-title">Últimas publicaciones</h2>
            <p class="section-subtitle">Novedades, tips y recursos del mundo del desarrollo.</p>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($latestPosts as $post)
            <article class="card p-5">
                @if($post->category)
                <span class="text-xs font-semibold uppercase tracking-wide text-primary-600 dark:text-primary-400">{{ $post->category->name }}</span>
                @endif
                <h3 class="mt-2 font-semibold text-gray-900 dark:text-white">
                    <a href="{{ route('blog.show', $post) }}" class="hover:text-primary-600 dark:hover:text-primary-400">{{ $post->title }}</a>
                </h3>
                <p class="mt-2 text-xs text-gray-400">{{ $post->created_at->format('d/m/Y') }} · {{ $post->visits }} visitas</p>
            </article>
            @empty
            <p class="text-gray-500 dark:text-gray-400">Todavía no hay publicaciones.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="border-t border-gray-100 bg-gradient-to-r from-primary-600 to-primary-500 py-16 dark:border-gray-900 sm:py-20">
    <div class="container-page text-center">
        <h2 class="text-3xl font-bold text-white sm:text-4xl">¿Tenés un proyecto en mente?</h2>
        <p class="mx-auto mt-4 max-w-2xl text-primary-50">Contame qué necesitás y armamos una propuesta a medida.</p>
        <div class="mt-8 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('contact.form') }}" class="btn-white">
                Contactar ahora
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
            </a>
            <a href="{{ route('portfolio') }}" class="btn-outline-white">Ver trabajos</a>
        </div>
    </div>
</section>
@endsection
