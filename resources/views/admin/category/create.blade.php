@extends('layouts.admin')
@section('title') Добавить категорию -  @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Добавить категорию</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Добавить новую категорию</li>
            </ol>

            <x-error></x-error>

            <div>
                <form method="post" action="{{ route('admin.category.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div><br>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="color">Цвет</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <br>
                </form><br>
            </div>
        </div>
@endsection
