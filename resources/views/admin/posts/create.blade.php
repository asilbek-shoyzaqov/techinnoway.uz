@extends('layouts.adminlayouts')
@section('title', 'Add Post')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Yangilik qo'shish</h4>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{session('success')}}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-10">
                    @can('create')
                        <form action="{{ route('admin.posts.store' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kategoriya</label>
                                        <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post nomi (UZ)</label>
                                        <input name="title_uz" type="text"
                                               class="form-control @error('title_uz') is-invalid @enderror">
                                        @error('title_uz')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post nomi (RU)</label>
                                        <input name="title_ru" type="text"
                                               class="form-control @error('title_ru') is-invalid @enderror">
                                        @error('title_ru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post nomi (EN)</label>
                                        <input name="title_en" type="text"
                                               class="form-control @error('title_en') is-invalid @enderror">
                                        @error('title_en')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post matni (UZ)</label>
                                        <textarea name="text_uz"
                                                  class="summernote @error('text_uz') is-invalid @enderror"></textarea>
                                        @error('text_uz')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post matni (RU)</label>
                                        <textarea name="text_ru"
                                                  class="summernote @error('text_ru') is-invalid @enderror"></textarea>
                                        @error('text_ru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post matni (EN)</label>
                                        <textarea name="text_en"
                                                  class="summernote @error('text_en') is-invalid @enderror"></textarea>
                                        @error('text_en')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input name="meta_title" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <textarea name="meta_keywords" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
        </section>
    </div>
@endsection
