@extends('layouts.adminlayouts')

@section('title', 'Edit User')

@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10">
                    <h2>Edit User</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" value="{{ $user->name }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" value="{{ $user->email }}"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Yangi Parol</label>
                                    <input id="password" name="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Parolni tasdiqlang</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Roles</label>
                                    <select name="roles[]" class="form-control @error('roles') is-invalid @enderror"
                                            multiple style="height: 100px">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordToggleBtn = document.querySelector('[onclick="togglePassword()"]');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggleBtn.textContent = "Hide";
        } else {
            passwordField.type = "password";
            passwordToggleBtn.textContent = "Show";
        }
    }
</script>
