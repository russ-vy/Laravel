@extends('layouts.admin')
@section('title') Список новостей - @parent @stop
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Список новостей</h6>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="float: right;">Добавить новость</a>
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
                    @foreach ($newsList as &$news)

                        <tr>
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->description }}</td>
                            <td>{{ $news->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="font-size: 12px; color: red">Уд.</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

{{--@push('js') - почему-то отказывается работать, а без него все отлично --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".delete").on('click', function() {
                if(confirm("Подтверждаете удаление ?")) {
                    $.ajax({
                        type: 'DELETE'
                        ,url: '/admin/news/' + $(this).attr('rel')
                        ,headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                        ,complete: () => {
                            alert('Запись удалена')
                            location.reload()
                        }
                    })
                }
            })
        })
    </script>
{{--@endpush--}}
