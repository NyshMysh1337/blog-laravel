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
        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        <div class="mb-20">
            <h1>Редактирование постов</h1>
        </div>
        @csrf
        @method('PATCH')
        <div class="form-group w-100" >
            <label>Название</label>
            <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{ $post->title }}">
        </div>
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
                            <textarea id="summernote" name="content">
                              {{ $post->content }}
                            </textarea>
        </div>
        @error('content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Обновить превью</label>
            <div class="w-25">
                <img src="{{ url('storage/' . $post->preview_image )}}" alt="preview_image" class="w-50">
            </div>
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
            <label>Обновить главное изображение</label>
            <div class="w-25">
                <img src="{{ url('storage/' . $post->main_image )}}" alt="main_image" class="w-50">
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                    <label class="custom-file-label" for="exampleInputFile"><ya-tr-span data-index="113-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Choose file" data-translation="Выберите файл" data-ch="0" data-type="trSpan">Выберите файл</ya-tr-span></label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text"><ya-tr-span data-index="114-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Upload" data-translation="Загрузка" data-ch="0" data-type="trSpan">Загрузка</ya-tr-span></span>
                </div>
                @error('main_image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Выберите категорию</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option
                        {{ $category->id == $post->category_id ? 'selected' : '' }}
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
                        {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                        value="{{ $tag->id }}">{{ $tag->title }}</option>php
                @endforeach
            </select>
            @error('tags_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Редактировать">
        </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
