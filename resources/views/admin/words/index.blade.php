@extends('layouts.adminlayouts')
@section('title', 'Manage Words')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4>Barcha Wordlar</h4>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Wordlar ro'yxati</h4>
                            <a href="{{ route('admin.words.create') }}" class="btn btn-info">Word qo'shish</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomi (UZ)</th>
                                    <th>Nomi (RU)</th>
                                    <th>Nomi (EN)</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($words as $word)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $word->name_uz }}</td>
                                        <td>{{ $word->name_ru }}</td>
                                        <td>{{ $word->name_en }}</td>
                                        <td>{{ $word->url }}</td>
                                        <td class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('admin.words.edit', $word->id) }}"
                                               class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                               title="Edit"><i class="fas fa-pencil-alt"></i></a>

                                            <form action="{{ route('admin.words.destroy', $word->id) }}" method="POST" id="delete-post-form-{{ $word->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-action"
                                                        onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-post-form-{{ $word->id }}').submit(); }">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
