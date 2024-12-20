@extends('layouts.adminlayouts')
@section('title', 'Edit Submenu')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10">
                    <h2>Submenu tahrirlamoq</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.submenus.update', $submenu->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ $submenu->menu_id == $menu->id ? 'selected' : '' }}>
                                                {{ $menu->name_uz }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (UZ)</label>
                                    <input name="name_uz" type="text" value="{{ $submenu->name_uz }}"
                                           class="form-control @error('name_uz') is-invalid @enderror">
                                    @error('name_uz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (RU)</label>
                                    <input name="name_ru" type="text" value="{{ $submenu->name_ru }}"
                                           class="form-control @error('name_ru') is-invalid @enderror">
                                    @error('name_ru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (EN)</label>
                                    <input name="name_en" type="text" value="{{ $submenu->name_en }}"
                                           class="form-control @error('name_en') is-invalid @enderror">
                                    @error('name_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Template belgilash</label>
                                    <input name="view_template" type="text" value="{{ $submenu->view_template }}"
                                           class="form-control @error('view_template') is-invalid @enderror">
                                    @error('view_template')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Body (UZ)</label>
                                    <textarea name="body_uz" class="summernote">{{ $submenu->body_uz }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Body (RU)</label>
                                    <textarea name="body_ru" class="summernote">{{ $submenu->body_ru }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Body (EN)</label>
                                    <textarea name="body_en" class="summernote">{{ $submenu->body_en }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input name="slug" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ $submenu->slug }}" readonly>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input name="meta_title" type="text"
                                           class="form-control" value="{{ $submenu->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control">{{ $submenu->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <textarea name="meta_keywords" class="form-control">{{ $submenu->meta_keywords }}</textarea>
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
