@extends('layouts.app')

@section('title', 'Новости - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Новости</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Новости</li>
            </ol>
        </nav>
    </div>
</section>

<!-- News List -->
<section class="news-list section">
    <div class="container">
        <div class="row g-4">
            @forelse($news as $newsItem)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="news-card">
                    @if($newsItem->image)
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
                    </div>
                    @endif
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="bi bi-calendar"></i> {{ $newsItem->formatted_date }}</span>
                            <span class="news-views"><i class="bi bi-eye"></i> {{ $newsItem->views }}</span>
                        </div>
                        <h3><a href="{{ route('news.show', $newsItem->slug) }}">{{ $newsItem->title }}</a></h3>
                        <p>{{ $newsItem->excerpt }}</p>
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="read-more">
                            Читать далее <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Новости скоро появятся
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($news->hasPages())
        <div class="mt-5">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
