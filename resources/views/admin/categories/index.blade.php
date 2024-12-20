@extends('layouts.adminlayouts')
@section('title', 'Manage Categories')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10">
                    <div class="card">
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
                        <div class="card-header d-flex justify-content-between">
                            <h4>Barcha Kategoriyalar</h4>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-info">Kategoriya qo'shmoq</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name (UZ)</th>
                                    <th scope="col">Name (RU)</th>
                                    <th scope="col">Name (EN)</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->name_uz }}</td>
                                        <td>{{ $category->name_ru }}</td>
                                        <td>{{ $category->name_en }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" id="delete-category-form-{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="if(confirm('Are you sure?')) { document.getElementById('delete-category-form-{{ $category->id }}').submit(); }"><i class="fas fa-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
