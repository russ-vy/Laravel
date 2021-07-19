@extends('layouts.admin')
@section('title') Добавить новость -  @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Добавить новость</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Добавить новую новость</li>
            </ol>

            <x-error></x-error>

            <div>
                <form method="post" action="{{ route('admin.news.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') === $category->id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div><br>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div><br>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select class="form-control" name="status" id="status">
                            <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                            <option @if(old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                            <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <br>
                </form><br>
            </div>
        </div>
@endsection
