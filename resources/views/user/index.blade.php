@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
            <div class="card-body">
                <h3><a class="btn btn-primary" href="{{ route('createuser') }}">+ Tambah User</a></h3>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts()  }}
@endpush
