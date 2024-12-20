@extends('layouts.adminlayouts')
@section('title', 'Add Menu')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10">
                    <h2>Menu qo'shmoq</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.menus.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name (UZ)</label>
                                    <input name="name_uz" type="text"
                                           class="form-control @error('name_uz') is-invalid @enderror">
                                    @error('name_uz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (RU)</label>
                                    <input name="name_ru" type="text"
                                           class="form-control @error('name_ru') is-invalid @enderror">
                                    @error('name_ru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (EN)</label>
                                    <input name="name_en" type="text"
                                           class="form-control @error('name_en') is-invalid @enderror">
                                    @error('name_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Template belgilash</label>
                                    <input name="view_template" type="text"
                                           class="form-control @error('view_template') is-invalid @enderror">
                                    @error('view_template')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Body (UZ)</label>
                                    <textarea name="body_uz" class="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Body (RU)</label>
                                    <textarea name="body_ru" class="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Body (EN)</label>
                                    <textarea name="body_en" class="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input name="meta_title" type="text"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control">
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
