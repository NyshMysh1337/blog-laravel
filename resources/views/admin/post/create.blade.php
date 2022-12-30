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
                        Добавить Пост
                    </h3>
                    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-100" >
                            <label>Название</label>
                            <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{ old('title') }}">
                        </div>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <textarea id="summernote" name="content">
                              {{ old('content') }}
                            </textarea>
                        </div>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Добавить превью</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile"><ya-tr-span data-index="113-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Choose file" data-translation="Выберите файл" data-ch="0" data-type="trSpan">Выберите файл</ya-tr-span></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text"><ya-tr-span data-index="114-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Upload" data-translation="Загрузка" data-ch="0" data-type="trSpan">Загрузка</ya-tr-span></span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Добавить главное изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile"><ya-tr-span data-index="113-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Choose file" data-translation="Выберите файл" data-ch="0" data-type="trSpan">Выберите файл</ya-tr-span></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text"><ya-tr-span data-index="114-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Upload" data-translation="Загрузка" data-ch="0" data-type="trSpan">Загрузка</ya-tr-span></span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option
                                        {{ $category->id == old('$category_id') ? ' selected' : '' }}
                                        value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <select class="select2" name="tags_id[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option
                                        {{ is_array( old('tags_id')) && in_array($tag->id, old('tags_id')) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>php
                                @endforeach
                            </select>
                            @error('tags_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
