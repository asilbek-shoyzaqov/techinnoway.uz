@extends('layouts.adminlayouts')
@section('title', 'Comments List')
@section('content')
    @include('admin.section.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="row mb-3">
                <div class="col-12">
                    <h4>Barcha Kommentlar</h4>
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

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ism va Familya</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Korxona Nomi</th>
                                <th>Izoh</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->tel }}</td>
                                    <td>{{ $comment->company }}</td>
                                    <td>{{ Str::limit($comment->comment, 50) }}</td>
                                    <td class="d-flex gap-2">
                                        @if($comment->read)
                                            <button class="btn btn-success btn-sm mr-1" disabled>
                                                <i class="fas fa-check"></i> O'qilgan
                                            </button>
                                        @else
                                            <a href="{{ route('admin.comments.show', $comment->id) }}"
                                               class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                               title="Edit"><i class="fas fa-eye"></i></a>
                                        @endif
                                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                              id="delete-post-form-{{ $comment->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-action"
                                                    onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-post-form-{{ $comment->id }}').submit(); }">
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
        </section>
    </div>
@endsection
