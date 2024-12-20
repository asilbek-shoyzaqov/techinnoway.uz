@extends('layouts.adminlayouts')

@section('title', 'Manage Examinees')

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
                            <h4>Barcha a'zolar</h4>
                            @can('create')
                                <a href="{{ route('admin.members.create') }}" class="btn btn-info">A'zolar
                                    qo'shmoq</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">F.I.Sh</th>
                                        <th scope="col">Jinsi</th>
                                        <th scope="col">Viloyat yoki shahar</th>
                                        <th scope="col">Login</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $member->fullname }}</td>
                                            <td>{{ ucfirst($member->gender) }}</td>
                                            <td>{{ $member->region }}</td>
                                            <td>{{ $member->login }}</td>
                                            <td>
                                                <span class="px-2 py-1 text-white
                                                    @if($member->status === 'active')
                                                        bg-green
                                                    @else
                                                        bg-red
                                                    @endif">
                                                    {{ ucfirst($member->status) }}
                                                </span>
                                            </td>
                                            <td class="d-flex gap-2 align-items-center">
                                                @can('edit')
                                                    <a href="{{ route('admin.members.edit', $member->id) }}"
                                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                       title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                @endcan

                                                @can('delete')
                                                    <form action="{{ route('admin.members.destroy', $member->id) }}"
                                                          method="POST" id="delete-examinee-form-{{ $member->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-danger btn-action mr-1" data-toggle="tooltip"
                                                           title="Delete"
                                                           onclick="if(confirm('O\'chirishni xohlaysizmi?')) { document.getElementById('delete-examinee-form-{{ $member->id }}').submit(); }"><i
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
