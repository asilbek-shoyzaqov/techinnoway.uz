@extends('layouts.adminlayouts')

@section('title', 'Edit Examinee')

@section('content')
    @include('admin.section.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6">
                    <h2>A'zolar tahrirlash</h2>
                    @can('edit')
                        <form action="{{ route('admin.members.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>F.I.Sh</label>
                                        <input name="fullname" type="text" value="{{ $member->fullname }}"
                                               class="form-control @error('fullname') is-invalid @enderror">
                                        @error('fullname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jinsi</label>
                                        <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                            <option value="erkak" {{ $member->gender == 'erkak' ? 'selected' : '' }}>
                                                Erkak
                                            </option>
                                            <option value="ayol" {{ $member->gender == 'ayol' ? 'selected' : '' }}>
                                                Ayol
                                            </option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tug'ilgan sanasi</label>
                                        <input name="birthdate" type="date" value="{{ $member->birthdate }}"
                                               class="form-control @error('birthdate') is-invalid @enderror">
                                        @error('birthdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
                                                <option
                                                    value="{{ $region }}" {{ $member->region == $region ? 'selected' : '' }}>
                                                    {{ $region }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Login</label>
                                        <input name="login" type="text" value="{{ $member->login }}"
                                               class="form-control @error('login') is-invalid @enderror">
                                        @error('login')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Yangi Parol</label>
                                        <div class="input-group">
                                            <input id="password" name="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary"
                                                        onclick="togglePassword()">Ko'rsatish
                                                </button>
                                            </div>
                                        </div>
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
                                        <label>Status</label>
                                        <select name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                            <option
                                                value="active" {{ $member->status == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option
                                                value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Special Status Maydoni Faqat Ruxsati Bo'lgan Foydalanuvchilar Uchun -->
                                    @can('special')
                                        <div class="form-group">
                                            <label>Maxsus imkoniyat</label>
                                            <select name="special_status"
                                                    class="form-control @error('special_status') is-invalid @enderror">
                                                <option
                                                    value="0" {{ $member->special_status == 0 ? 'selected' : '' }}>No
                                                </option>
                                                <option
                                                    value="1" {{ $member->special_status == 1 ? 'selected' : '' }}>Yes
                                                </option>
                                            </select>
                                            @error('special_status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endcan

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

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordToggleBtn = document.querySelector('[onclick="togglePassword()"]');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggleBtn.textContent = "Yashir";
        } else {
            passwordField.type = "password";
            passwordToggleBtn.textContent = "Ko'rsatish";
        }
    }
</script>
