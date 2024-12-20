@extends('layouts.adminlayouts')
@section('title', 'Manage Posts')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                        <div class="card-header d-flex justify-content-between">
                            <h4>Barcha Yangiliklar</h4>
                            @can('create')
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-info">Yangilik qo'shmoq</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Post nomi (UZ)</th>
                                        <th>Kategoriya</th>
                                        <th>Ko'rishlar soni</th>
                                        <th>Status</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post->title_uz }}</td>
                                            <td>{{ $post->category->name_uz ?? 'Kategoriya yo\'q' }}</td>
                                            <td>{{ $post->view }}</td>
                                            <td>
                                                @if ($post->status)
                                                    <span class="badge badge-success">Faol</span>
                                                @else
                                                    <span class="badge badge-danger">Nofaol</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td class="d-flex gap-2 align-items-center">
                                                @can('edit')
                                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                       title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                @endcan
                                                @can('delete')
                                                    <form action="{{ route('admin.posts.destroy', $post->id) }}"
                                                          method="POST" id="delete-post-form-{{ $post->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                           title="Delete"
                                                           onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-post-form-{{ $post->id }}').submit(); }"><i
                                                                class="fas fa-trash"></i></a>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
