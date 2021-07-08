@extends('layouts.admin')
@section('title') Список новостей - @parent @stop
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список новостей</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($newsList as &$news)

                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $news['title'] }}</td>
                            <td>{{ $news['description'] }}</td>
                            <td>{{ now()->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', ['news' => $loop->index]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
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
