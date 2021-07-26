@extends('layouts.admin')
@section('title') Список пользователей - @parent @stop
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Список пользователей</h6>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary" style="float: right;">Добавить пользователя</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('inc.message')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Псевдоним</th>
                        <th>Почта</th>
                        <th>Дата обновления</th>
                        <th>Админ</th>
                        <th>Управление</th>
                    </tr>
                    </thead>

                    @if(count($userList) > 10)
                        <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>Псевдоним</th>
                            <th>Почта</th>
                            <th>Дата обновления</th>
                            <th>Админ</th>
                            <th>Управление</th>
                        </tr>
                        </tfoot>
                    @endif

                    <tbody>
                    @foreach ($userList as &$user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->is_admin }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" style="font-size: 12px;">Ред.</a>&nbsp; | &nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="font-size: 12px; color: red">Уд.</a>
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
                    ,url: '/admin/user/' + $(this).attr('rel')
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
