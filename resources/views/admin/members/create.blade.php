@extends('layouts.adminlayouts')
@section('title', 'Add Examinee')
@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6">
                    <h2>A'zolar qo'shmoq</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @can('create')
                        <form action="{{ route('admin.members.store')}}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <!-- Fullname Input -->
                                    <div class="form-group">
                                        <label>F.I.Sh</label>
                                        <input name="fullname" type="text"
                                               class="form-control @error('fullname') is-invalid @enderror"
                                               value="{{ old('fullname') }}">
                                        @error('fullname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Gender Input -->
                                    <div class="form-group">
                                        <label>Jinsi</label>
                                        <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                            <option value="erkak">Erkak</option>
                                            <option value="ayol">Ayol</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Birthdate Input -->
                                    <div class="form-group">
                                        <label>Tug'ilgan sanasi</label>
                                        <input name="birthdate" type="date"
                                               class="form-control @error('birthdate') is-invalid @enderror"
                                               value="{{ old('birthdate') }}">
                                        @error('birthdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Region Input -->
                                    <div class="form-group">
                                        <label>Viloyat yoki shahar</label>
                                        <select name="region"
                                                class="form-control @error('region') is-invalid @enderror">
                                            @php
                                                $regions = [
                                                    'Toshkent shahar', 'Andijon viloyati', 'Buxoro viloyati', 'Fargʻona viloyati',
                                                    'Jizzax viloyati', 'Xorazm viloyati', 'Namangan viloyati', 'Navoiy viloyati', 'Qashqadaryo viloyati',
                                                    'Qoraqalpogʻiston Respublikasi', 'Samarqand viloyati', 'Sirdaryo viloyati', 'Surxondaryo viloyati', 'Toshkent viloyati'
                                                ];
                                            @endphp
                                            @foreach ($regions as $region)
                                                <option value="{{ $region }}">{{ $region }}</option>
                                            @endforeach
                                        </select>
                                        @error('region')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Login Input -->
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input name="login" type="text"
                                               class="form-control @error('login') is-invalid @enderror"
                                               value="{{ old('login') }}">
                                        @error('login')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group">
                                        <label>Parol</label>
                                        <input name="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Status Input -->
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Saqlamoq</button>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
        </section>
    </div>
@endsection
