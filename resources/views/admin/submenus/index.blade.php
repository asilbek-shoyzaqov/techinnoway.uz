@extends('layouts.adminlayouts')
@section('title', 'Manage Submenus')
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
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <h4>Barcha Submenular</h4>
                            <a href="{{ route('admin.submenus.create') }}" class="btn btn-info">Submenu qo'shmoq</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Name (UZ)</th>
                                        <th scope="col">Name (RU)</th>
                                        <th scope="col">Name (EN)</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Template</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($submenus as $submenu)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $submenu->menu->name_uz }}</td>
                                            <td>{{ $submenu->name_uz }}</td>
                                            <td>{{ $submenu->name_ru }}</td>
                                            <td>{{ $submenu->name_en }}</td>
                                            <td>{{ $submenu->slug }}</td>
                                            <td>{{ $submenu->view_template }}</td>
                                            <td class="d-flex gap-2 align-items-center">
                                                <a href="{{ route('admin.submenus.edit', $submenu->id) }}"
                                                   class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                   title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                &nbsp;
                                                &nbsp;
                                                <form action="{{ route('admin.submenus.destroy', $submenu->id) }}"
                                                      method="POST" id="delete-submenu-form-{{ $submenu->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                       title="Delete"
                                                       onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-submenu-form-{{ $submenu->id }}').submit(); }"><i
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
