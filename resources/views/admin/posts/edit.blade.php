@extends('layouts.adminlayouts')
@section('title', 'Edit Post')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Yangilikni tahrirlash</h4>
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
                <div class="col-8">
                    @can('edit')
                        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group col-3">
                                        <label>Yaratilgan vaqt</label>
                                        <input type="datetime-local" name="created_at" value="{{ $post->created_at->format('Y-m-d\TH:i') }}" class="form-control @error('created_at') is-invalid @enderror">
                                        @error('created_at')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kategoriya</label>
                                        <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_uz }}</option>
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
                                        <input name="title_uz" type="text" value="{{ $post->title_uz }}"
                                               class="form-control @error('title_uz') is-invalid @enderror">
                                        @error('title_uz')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post nomi (RU)</label>
                                        <input name="title_ru" type="text" value="{{ $post->title_ru }}"
                                               class="form-control @error('title_ru') is-invalid @enderror">
                                        @error('title_ru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post nomi (EN)</label>
                                        <input name="title_en" type="text" value="{{ $post->title_en }}"
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
                                                  class="summernote @error('text_uz') is-invalid @enderror">{{ $post->text_uz }}</textarea>
                                        @error('text_uz')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post matni (RU)</label>
                                        <textarea name="text_ru"
                                                  class="summernote @error('text_ru') is-invalid @enderror">{{ $post->text_ru }}</textarea>
                                        @error('text_ru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Post matni (EN)</label>
                                        <textarea name="text_en"
                                                  class="summernote @error('text_en') is-invalid @enderror">{{ $post->text_en }}</textarea>
                                        @error('text_en')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Status maydoni -->
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                            <option value="0" {{ $post->status== 0 ? 'selected' : '' }}>Nofaol</option>
                                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Faol</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input name="meta_title" type="text" class="form-control"
                                               value="{{ $post->meta_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description"
                                                  class="form-control">{{ $post->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <textarea name="meta_keywords"
                                                  class="form-control">{{ $post->meta_keywords }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>
                @can('edit')
                    <!-- File boshqarish modali -->
                    @include('admin.posts.modal_index')
                @endcan
            </div>
        </section>
    </div>
    <!-- File qo'shish modali -->
    @include('admin.posts.modal_add')
    <!-- File tahrirlash modali -->
    @include('admin.posts.modal_edit')
@endsection
