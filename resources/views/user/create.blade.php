@extends('adminlte::page')

@section('title', 'Form User')

@section('content_header')
    <h1>Form User</h1>
@stop

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Input User</h3>
        </div>

        <form method="post" action="../user">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter Username">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Enter Nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="passowrd" name="password" placeholder="Enter Password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Select Level</label>
                    <select class="form-control" id="levelId" name="levelId" class=" @error('levelId') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                        @endforeach
                    </select>
                    @error('levelId')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('indexuser') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
