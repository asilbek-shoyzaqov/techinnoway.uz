@extends('layouts.adminlayouts')
@section('title', 'Dashboard')
@section('content')
    @include('admin.section.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        @include('admin.section.admin-section')
        @include('admin.section.settings')
    </div>
@endsection
