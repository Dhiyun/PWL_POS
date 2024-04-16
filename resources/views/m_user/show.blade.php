@extends('layouts.app')

@section('subtitle', 'M_User')
@section('content_header_title', 'Show')
@section('content_header_subtitle', 'M_User')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Show M_User</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <li><strong>User_id:</strong>
                        {{ $useri->user_id }}
                        <hr></li>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <li><strong>Level_id:</strong>
                        {{ $useri->level_id }}
                        <hr></li>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <li><strong>Username:</strong>
                        {{ $useri->username }}
                        <hr></li>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <li><strong>Nama:</strong>
                        {{ $useri->nama }}
                        </li>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection