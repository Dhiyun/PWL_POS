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
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input User</h3>
        </div>

        <form action="{{ route('m_user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="passowrd" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label>Select Level</label>
                    <select class="form-control" id="level_id" name="level_id">
                        <option value="">Select</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('m_user.index') }}" class="btn btn-secondary">Back</a>
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
