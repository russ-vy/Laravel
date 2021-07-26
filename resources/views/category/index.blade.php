@extends('layouts.main')
@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <!-- Category list-->
                @foreach ($categoryList as &$category)
                    <div class="category-list">
                        <h2>
                            <a href="{{ route('category.show', ['category' => $category]) }}">
                                <h2 class="category-title">{{ $category['title'] }}</h2>
                            </a>
                        </h2>
                        <p>{!! $category['description'] !!}</p>
                    </div>

                    <!-- Divider-->
                    <hr class="my-4" />
                {{--@empty--}}
                {{--    <h2>Записей нет</h2>--}}
                @endforeach

            <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    {{ $categoryList->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
