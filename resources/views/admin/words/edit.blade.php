@extends('layouts.adminlayouts')
@section('title', 'Edit Word')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Word tahrirlash</h4>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('admin.words.update', $word->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomi (UZ)</label>
                                    <input name="name_uz" type="text" value="{{ $word->name_uz }}" class="form-control @error('name_uz') is-invalid @enderror">
                                    @error('name_uz')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomi (RU)</label>
                                    <input name="name_ru" type="text" value="{{ $word->name_ru }}" class="form-control @error('name_ru') is-invalid @enderror">
                                    @error('name_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomi (EN)</label>
                                    <input name="name_en" type="text" value="{{ $word->name_en }}" class="form-control @error('name_en') is-invalid @enderror">
                                    @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Matn (UZ)</label>
                                    <textarea name="text_uz" class="summernote @error('text_uz') is-invalid @enderror">{{ $word->text_uz }}</textarea>
                                    @error('text_uz')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Matn (RU)</label>
                                    <textarea name="text_ru" class="summernote @error('text_ru') is-invalid @enderror">{{ $word->text_ru }}</textarea>
                                    @error('text_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Matn (EN)</label>
                                    <textarea name="text_en" class="summernote @error('text_en') is-invalid @enderror">{{ $word->text_en }}</textarea>
                                    @error('text_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input name="url" type="text" value="{{ $word->url }}" class="form-control @error('url') is-invalid @enderror">
                                    @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Yangilash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
