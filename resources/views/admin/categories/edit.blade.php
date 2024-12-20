@extends('layouts.adminlayouts')
@section('title', 'Edit Category')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6">
                    <h2>Kategoriyani tahrirlamoq/h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name (UZ)</label>
                                    <input name="name_uz" type="text" value="{{ $category->name_uz }}"
                                           class="form-control @error('name_uz') is-invalid @enderror">
                                    @error('name_uz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (RU)</label>
                                    <input name="name_ru" type="text" value="{{ $category->name_ru }}"
                                           class="form-control @error('name_ru') is-invalid @enderror">
                                    @error('name_ru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (EN)</label>
                                    <input name="name_en" type="text" value="{{ $category->name_en }}"
                                           class="form-control @error('name_en') is-invalid @enderror">
                                    @error('name_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input name="slug" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ $category->slug }}">
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input name="meta_title" type="text"
                                           class="form-control" value="{{ $category->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <textarea name="meta_keywords" class="form-control">{{ $category->meta_keywords }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
