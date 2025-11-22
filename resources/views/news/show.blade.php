@extends('layouts.app')

@section('title', $newsItem->title . ' - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>{{ $newsItem->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Новости</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($newsItem->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- News Detail -->
<section class="news-detail section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Meta -->
                <div class="news-meta-detail mb-4">
                    <span class="me-3"><i class="bi bi-calendar"></i> {{ $newsItem->formatted_date }}</span>
                    <span><i class="bi bi-eye"></i> {{ $newsItem->views }} просмотров</span>
                </div>
                
                <!-- News Image -->
                @if($newsItem->image)
                <div class="news-image-detail mb-4">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid rounded">
                </div>
                @endif
                
                <!-- News Content -->
                <div class="news-content-detail">
                    {!! nl2br(e($newsItem->content)) !!}
                </div>
                
                <!-- Share Buttons -->
                <div class="share-buttons mt-5">
                    <h5>Поделиться:</h5>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Related News -->
                    @if($relatedNews->count() > 0)
                    <div class="sidebar-widget">
                        <h4>Похожие новости</h4>
                        <div class="related-news">
                            @foreach($relatedNews as $related)
                            <div class="related-item mb-3">
                                @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="img-fluid rounded mb-2">
                                @endif
                                <h6><a href="{{ route('news.show', $related->slug) }}">{{ $related->title }}</a></h6>
                                <small class="text-muted">{{ $related->formatted_date }}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="sidebar-widget">
                        <h4>Подписаться на новости</h4>
                        <p>Будьте в курсе последних событий</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Ваш email">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-envelope"></i> Подписаться
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
