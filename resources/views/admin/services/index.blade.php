@extends('layouts.adminlayouts')
@section('title', 'Manage Services')
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
                            <h4>Barcha Xizmatlar</h4>
                            <a href="{{ route('admin.services.create') }}" class="btn btn-info">Xizmatlar qo'shmoq</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Submenu</th>
                                    <th scope="col">Name (UZ)</th>
                                    <th scope="col">Name (RU)</th>
                                    <th scope="col">Name (EN)</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Template</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $service->submenu->name_uz }}</td>
                                        <td>{{ $service->name_uz }}</td>
                                        <td>{{ $service->name_ru }}</td>
                                        <td>{{ $service->name_en }}</td>
                                        <td>{{ $service->slug }}</td>
                                        <td>{{ $service->view_template }}</td>
                                        <td class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            &nbsp;
                                            &nbsp;
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" id="delete-service-form-{{ $service->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-service-form-{{ $service->id }}').submit(); }"><i class="fas fa-trash"></i></a>
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
