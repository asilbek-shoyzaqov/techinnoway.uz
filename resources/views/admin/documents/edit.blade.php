@extends('layouts.adminlayouts')
@section('title', 'Edit Document')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Document tahrirlash</h4>
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
                    <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>PDF Fayl</label>
                                    <input name="pdf" type="file" class="form-control @error('pdf') is-invalid @enderror" accept=".pdf">
                                    @error('pdf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($document->pdf)
                                        <a href="{{ Storage::url($document->pdf) }}" target="_blank">Hozirgi PDF Faylni Ko'rish</a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Rasm Fayl</label>
                                    <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" accept=".jpeg,.jpg,.png">
                                    @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($document->img)
                                        <img src="{{ Storage::url($document->img) }}" alt="Rasm ko'rinish" style="max-width: 150px; margin-top: 10px;">
                                    @endif
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
