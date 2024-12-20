@extends('layouts.adminlayouts')
@section('title', 'Add Manage')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10">
                    <h2>Rahbar qo'shmoq</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.manages.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Profession (UZ)</label>
                                    <input name="profession_uz" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Profession (RU)</label>
                                    <input name="profession_ru" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Profession (EN)</label>
                                    <input name="profession_en" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tel</label>
                                    <input name="tel" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Reception Time</label>
                                    <input name="reception_time" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address (UZ)</label>
                                    <input name="address_uz" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address (RU)</label>
                                    <input name="address_ru" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address (EN)</label>
                                    <input name="address_en" type="text" class="form-control">
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
                                    <label>Image</label>
                                    <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input name="slug" type="text"
                                           class="form-control @error('slug') is-invalid @enderror">
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input name="meta_title" type="text"
                                           class="form-control">
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
                </div>
            </div>
        </section>
    </div>
@endsection
