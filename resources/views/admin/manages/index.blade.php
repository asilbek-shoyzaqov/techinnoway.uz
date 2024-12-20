@extends('layouts.adminlayouts')
@section('title', 'Manage Manages')
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
                            <h4>Barcha Rahbarlar</h4>
                            <a href="{{ route('admin.manages.create') }}" class="btn btn-info">Rahbar qo'shmoq</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Lavozimi</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Template belgilash</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($manages as $manage)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $manage->name_uz }}</td>
                                            <td>{{ $manage->profession_uz }}</td>
                                            <td>{{ $manage->email }}</td>
                                            <td>{{ $manage->slug }}</td>
                                            <td>{{ $manage->view_template }}</td>
                                            <td class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('admin.manages.edit', $manage->id) }}"
                                                   class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                   title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.manages.destroy', $manage->id) }}"
                                                      method="POST" id="delete-manage-form-{{ $manage->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                       title="Delete"
                                                       onclick="if(confirm('Are you sure?')) { document.getElementById('delete-manage-form-{{ $manage->id }}').submit(); }"><i
                                                            class="fas fa-trash"></i></a>
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
            </div>
        </section>
    </div>
@endsection
