@extends('layouts.app')

@section('title', $post->title . ' — CarabajalDev')
@section('description', \Illuminate\Support\Str::limit(strip_tags($post->content), 160))

@section('content')
<article class="py-12 sm:py-16">
    <div class="container-page max-w-3xl">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Volver al blog
        </a>

        <header class="mt-6">
            @if($post->category)
            <span class="text-sm font-semibold uppercase tracking-wide text-primary-600 dark:text-primary-400">{{ $post->category->name }}</span>
            @endif
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">{{ $post->title }}</h1>
            <div class="mt-4 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-gray-500 dark:text-gray-400">
                @if($post->author)
                <span>{{ $post->author }}</span>
                @endif
                <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('d \d\e F \d\e Y') }}</time>
                <span>{{ $post->visits }} visitas</span>
            </div>
        </header>

        @if($post->featured_url)
        <img src="{{ $post->featured_url }}" alt="{{ $post->title }}" class="mt-8 w-full rounded-2xl object-cover shadow-lg" loading="eager">
        @endif

        <div class="prose prose-gray mt-8 max-w-none dark:prose-invert">
            {!! $post->content !!}
        </div>
    </div>
</article>

@if($latestPosts->isNotEmpty())
<section class="border-t border-gray-100 bg-gray-50 py-14 dark:border-gray-900 dark:bg-gray-900/40">
    <div class="container-page">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Seguir leyendo</h2>
        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach($latestPosts as $related)
            <article class="card p-5">
                @if($related->category)
                <span class="text-xs font-semibold uppercase tracking-wide text-primary-600 dark:text-primary-400">{{ $related->category->name }}</span>
                @endif
                <h3 class="mt-2 font-semibold text-gray-900 dark:text-white">
                    <a href="{{ route('blog.show', $related) }}" class="hover:text-primary-600 dark:hover:text-primary-400">{{ $related->title }}</a>
                </h3>
                <p class="mt-1 text-xs text-gray-400">{{ $related->created_at->format('d/m/Y') }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
