@extends('adminlte::page')

@section('title', 'Form Level')

@section('content_header')
    <h1>Form Level</h1>
@stop

@section('content')
<!-- general form elements disabled -->
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
          <h3 class="card-title">Input Level</h3>
        </div>
        
        <form method="post" action="../level">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeLevel">Level Kode</label>
                    <input type="text" class="form-control @error('kodeLevel') is-invalid @enderror" id="kodeLevel" name="kodeLevel" placeholder="Enter Code Level">
                    @error('kodeLevel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaLevel">Level Name</label>
                    <input type="text" class="form-control" id="namaLevel" name="namaLevel" placeholder="Enter Nama Level">
                    @error('namaLevel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('indexlevel') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
    