@extends('layouts.app')

@section('title', 'Blog — CarabajalDev')
@section('description', 'Artículos sobre desarrollo web, herramientas y productividad.')

@section('content')
<section class="border-b border-gray-100 py-16 dark:border-gray-900 sm:py-20">
    <div class="container-page">
        <div class="max-w-2xl">
            <h1 class="section-title">Blog</h1>
            <p class="section-subtitle">Guías, tips y reflexiones sobre desarrollo de software y productividad.</p>
        </div>

        <div class="mt-8 flex flex-wrap gap-2">
            <a href="{{ route('blog.index') }}" class="rounded-full px-4 py-2 text-sm font-medium transition {{ $activeCategory === '' ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800' }}">Todos</a>
            @foreach($categories as $category)
            <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="rounded-full px-4 py-2 text-sm font-medium transition {{ $activeCategory === $category->slug ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800' }}">
                {{ $category->name }}
                <span class="ml-1 text-xs opacity-70">({{ $category->posts_count }})</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container-page">
        @if($posts->isEmpty())
        <div class="card p-10 text-center">
            <p class="text-gray-500 dark:text-gray-400">No hay publicaciones en esta categoría todavía.</p>
        </div>
        @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
            <article class="card-hover flex flex-col overflow-hidden">
@if($post->featured_url)
                    <img src="{{ $post->featured_url }}" alt="{{ $post->title }}" class="h-44 w-full object-cover" loading="lazy">
                @endif
                <div class="flex flex-1 flex-col p-5">
                    @if($post->category)
                    <span class="text-xs font-semibold uppercase tracking-wide text-primary-600 dark:text-primary-400">{{ $post->category->name }}</span>
                    @endif
                    <h2 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                        <a href="{{ route('blog.show', $post) }}" class="hover:text-primary-600 dark:hover:text-primary-400">{{ $post->title }}</a>
                    </h2>
                    <p class="mt-2 flex-1 text-sm text-gray-500 dark:text-gray-400">{!! \Illuminate\Support\Str::limit(strip_tags($post->content), 120) !!}</p>
                    <div class="mt-4 flex items-center justify-between text-xs text-gray-400">
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span>{{ $post->visits }} visitas</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
