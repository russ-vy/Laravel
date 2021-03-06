@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Список Категорий</h6>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary" style="float: right;">Добавить категорию</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('inc.message')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата обновления</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата обновления</th>
                        <th>Управление</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($categoryList as &$category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }} ({{ optional($category->news)->count() }})</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                <a href="javascript:;" style="font-size: 12px; color: red">Уд.</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
