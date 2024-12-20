@extends('layouts.adminlayouts')

@section('title', 'Rolni tahrirlash')

@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6">
                    <h2>Rolni tahrirlash</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomi</label>
                                    <input name="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $role->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ruxsatnomalar</label>
                                    <div class="form-check">
                                        @foreach($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]"
                                                       value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                <span>{{ $permission->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
