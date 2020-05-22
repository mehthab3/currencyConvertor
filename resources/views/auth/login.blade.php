@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                <a class="btn btn-danger btn-block col-md-4 fa fa-google" href="{{ route('google') }}">
                                    Login using Google
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
