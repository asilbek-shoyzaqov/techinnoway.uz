@extends('layouts.adminlayouts')
@section('title', 'Manage Documents')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4>Barcha Documentlar</h4>
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
                            <h4>Documentlar ro'yxati</h4>
                            <a href="{{ route('admin.documents.create') }}" class="btn btn-info">Document qo'shish</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PDF Fayl</th>
                                    <th>Rasm Fayl</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documents as $document)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @if ($document->pdf)
                                                <a href="{{ Storage::url($document->pdf) }}" target="_blank">PDF Faylni Ko'rish</a>
                                            @else
                                                Yo'q
                                            @endif
                                        </td>
                                        <td>
                                            @if ($document->img)
                                                <img src="{{ Storage::url($document->img) }}" alt="Rasm ko'rinish" style="max-width: 150px;">
                                            @else
                                                Yo'q
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2 align-items-center">
                                            <a href="{{ route('admin.documents.edit', $document->id) }}"
                                               class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                               title="Edit"><i class="fas fa-pencil-alt"></i></a>

                                            <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" id="delete-document-form-{{ $document->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-action"
                                                        onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-document-form-{{ $document->id }}').submit(); }">
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
        </section>
    </div>
@endsection
