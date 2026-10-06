@extends('layouts.app')

@section('title', 'Portfolio — CarabajalDev')
@section('description', 'Proyectos y clientes de CarabajalDev.')

@section('content')
<section class="border-b border-gray-100 py-16 dark:border-gray-900 sm:py-20">
    <div class="container-page">
        <div class="max-w-2xl">
            <h1 class="section-title">Portfolio</h1>
            <p class="section-subtitle">Proyectos que ayudaron a cooperativas, pymes y organizaciones a potenciar su presencia digital.</p>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container-page">
        <div class="grid gap-6 md:grid-cols-3">
            @foreach($clients as $client)
            <article class="card-hover flex flex-col overflow-hidden">
                <div class="flex h-40 items-center justify-center bg-gray-50 p-6 dark:bg-gray-800/60">
                    <img src="{{ $client['logo'] }}" alt="{{ $client['name'] }}" class="max-h-24 w-auto object-contain" loading="lazy">
                </div>
                <div class="flex flex-1 flex-col p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $client['name'] }}</h2>
                    <p class="mt-2 flex-1 text-sm text-gray-500 dark:text-gray-400">{{ $client['description'] }}</p>
                    <a href="{{ $client['url'] }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-primary-600 hover:text-primary-500 dark:text-primary-400">
                        Visitar sitio
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m13.5 6 6 6-6 6m-6-6 6 6-6 6" /></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section id="acercade" class="border-t border-gray-100 bg-gray-50 py-16 dark:border-gray-900 dark:bg-gray-900/40 sm:py-20">
    <div class="container-page grid items-center gap-10 lg:grid-cols-2">
        <div class="relative">
            <div class="absolute -inset-3 rounded-[2rem] bg-gradient-to-tr from-primary-400/20 to-sky-400/20 blur-2xl"></div>
            <img src="{{ $avatar }}" alt="CarabajalDev" class="relative mx-auto w-full max-w-sm rounded-3xl object-cover shadow-xl">
        </div>
        <div>
            <h2 class="section-title">Acerca de mí</h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400">
                Soy desarrollador web especializado en Laravel y Filament. Me gusta construir productos claros: interfaces que se entienden, código que se mantiene y resultados que se pueden medir.
            </p>
            <p class="mt-4 text-gray-500 dark:text-gray-400">
                Trabajo con cooperativas, pymes y equipos que necesitan digitalizar procesos sin perder el toque humano.
            </p>
            <div class="mt-6 flex flex-wrap gap-2">
                <span class="rounded-full bg-white px-3 py-1 text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Laravel</span>
                <span class="rounded-full bg-white px-3 py-1 text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Filament</span>
                <span class="rounded-full bg-white px-3 py-1 text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Livewire</span>
                <span class="rounded-full bg-white px-3 py-1 text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Tailwind</span>
                <span class="rounded-full bg-white px-3 py-1 text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">MySQL</span>
            </div>
            <a href="{{ route('contact.form') }}" class="btn-primary mt-8">Trabajemos juntos</a>
        </div>
    </div>
</section>
@endsection
