@extends('layouts.app')

@section('subtitle', 'Level')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Level')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Level</div>
            <div class="card-body">
                <h3><a class="btn btn-primary" href="{{ route('createlevel') }}">+ Tambah Level</a></h3>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts()  }}
@endpush
