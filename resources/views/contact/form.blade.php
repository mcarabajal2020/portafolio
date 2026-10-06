@extends('layouts.app')

@section('title', 'Contacto — CarabajalDev')
@section('description', 'Contactá a CarabajalDev para tu próximo proyecto web.')

@section('content')
<section class="py-16 sm:py-20">
    <div class="container-page grid gap-12 lg:grid-cols-2">
        <div>
            <h1 class="section-title">Contacto</h1>
            <p class="section-subtitle">Contame sobre tu proyecto y te respondo a la brevedad.</p>

            <div class="mt-8 space-y-4">
                <div class="card flex items-start gap-4 p-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                    </div>
                    <div>
                        <h2 class="font-semibold text-gray-900 dark:text-white">Email</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">info@carabajaldev.com.ar</p>
                    </div>
                </div>

                <div class="card flex items-start gap-4 p-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                    </div>
                    <div>
                        <h2 class="font-semibold text-gray-900 dark:text-white">Ubicación</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Argentina · Trabajo remoto</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-6 sm:p-8">
            @if(session('success'))
            <div class="mb-6 rounded-xl border border-primary-200 bg-primary-50 px-4 py-3 text-sm text-primary-700 dark:border-primary-800 dark:bg-primary-950 dark:text-primary-300">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-4" id="contact-form">
                @csrf

                <div>
                    <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @error('name')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="phone" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required
                               class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        @error('phone')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                               class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        @error('email')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label for="subject" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Asunto</label>
                    <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @error('subject')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="message" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Mensaje</label>
                    <textarea id="message" name="message" rows="5" required
                              class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn-primary w-full">Enviar mensaje</button>
            </form>
        </div>
    </div>
</section>
@endsection
