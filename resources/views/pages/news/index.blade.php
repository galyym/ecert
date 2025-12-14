@extends('layouts.app')

@section('title', 'Новости - ТОО ВсеСтрой')
@section('meta_description', 'Актуальные новости и события ТОО ВсеСтрой. Следите за обновлениями в сфере аттестации и сертификации.')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ __('messages.news_title') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.news_title') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="news-grid section">
    <div class="container">
        @if($news->isNotEmpty())
        <div class="row g-4">
            @foreach($news as $newsItem)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                <article class="news-card card-modern">
                    @if($newsItem->featured_image)
                    <div class="news-image">
                        <img src="{{ Storage::disk('public')->url($newsItem->featured_image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
                    </div>
                    @endif

                    <div class="news-content p-4">
                        <div class="news-meta mb-2">
                            <span class="text-corporate-blue">
                                <i class="bi bi-calendar"></i>
                                {{ $newsItem->published_at->format('d.m.Y') }}
                            </span>
                        </div>

                        <h3 class="news-title h5 mb-3">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="text-decoration-none">
                                {{ $newsItem->title }}
                            </a>
                        </h3>

                        @if($newsItem->excerpt)
                        <p class="text-muted mb-3">{{ Str::limit($newsItem->excerpt, 120) }}</p>
                        @endif

                        <a href="{{ route('news.show', $newsItem->slug) }}" class="btn btn-outline-primary btn-sm">
                            {{ __('messages.read_more') }}
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="no-news py-5">
                    <i class="bi bi-newspaper" style="font-size: 4rem; color: var(--corporate-blue);"></i>
                    <h3 class="mt-3">{{ __('messages.no_news_title') }}</h3>
                    <p class="text-muted">{{ __('messages.no_news_desc') }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('styles')
<style>
    .news-image {
        overflow: hidden;
        border-radius: 15px 15px 0 0;
        height: 200px;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.05);
    }

    .news-title a {
        color: var(--corporate-navy);
        transition: color 0.3s ease;
    }

    .news-title a:hover {
        color: var(--corporate-blue);
    }
</style>
@endpush