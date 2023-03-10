@extends('admin.layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-block btn-outline-primary"><ya-tr-span data-index="376-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Primary" data-translation="Основной" data-ch="0" data-type="trSpan" data-selected="false">Добавить</ya-tr-span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Название</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="{{ route('admin.users.show', $user->id) }}">Посмотреть</a></td>
                                        <td><a href="{{ route('admin.users.edit', $user->id) }}">Изменить</a></td>
                                        <td>
                                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
