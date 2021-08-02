@extends('layouts.main')
@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <!-- Post preview-->
                @foreach ($newsList as &$news)
                    <div class="post-preview">
                        <a href="{{ route('news.show', ['news' => $news]) }}">
                            <h2 class="post-title">
                                {{ $news->title }}
                            </h2>
                            @if($news->image)
                                <img src="{{ Storage::disk('public')->url($news->image) }}" style="width: 130px;">
                            @endif
                            <h3 class="post-subtitle">
                                {!! $news->description !!}
                            </h3>
                        </a>
                        <p class="post-meta">
                            <strong>Категория: {{ optional($news->category)->title }}</strong><br>
                            <a href="#">Author</a><br>
                            {{ $news->created_at->format('d-m-Y H:i') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                {{--@empty--}}
                {{--    <h2>Записей нет</h2>--}}
                @endforeach

                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    {{ $newsList->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
