@extends('admin.layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
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
            <div class="row">
                <div class="col-4">
                    <h3 class="mb-3">
                        Добавить пользователя
                    </h3>
                    <form action="{{ route('admin.users.store') }}" method="POST" class="w-50">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Имя">
                        </div>
                        @error('name')
                            <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="email">
                        </div>
                        @error('email')
                            <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                        </div>
                        @error('password')
                        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
