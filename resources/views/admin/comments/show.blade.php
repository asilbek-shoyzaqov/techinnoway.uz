@extends('layouts.adminlayouts')
@section('title', 'Comment Details')
@section('content')
    @include('admin.section.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="row mb-3">
                <div class="col-12">
                    <h4>Komment Batafsil Ma'lumot</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <strong>Ism va Familya:</strong> {{ $comment->name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong> {{ $comment->email }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <strong>Telefon:</strong> {{ $comment->tel }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Korxona Nomi:</strong> {{ $comment->company }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <strong>Izoh:</strong>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Orqaga</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
