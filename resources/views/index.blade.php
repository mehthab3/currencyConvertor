@extends('layouts.app')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              
                <div class="panel-heading">Currency Convertor</div>

                <div class="panel-body">
              
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
          
                    <strong> Your Base Currency : 1 {{$base}}   <a href ="/editbase">Edit Base</a>
                    <br>
                    _______________________________________________
                    <br>
                    <br>
                    Today’s Value :  <a href ="/editCurrView">Change Conversions</a>
                    <br>
                    <br>
                    @foreach( $conversion as $key => $conv)
                      {{$key}} :: {{$conv}}
                      <br>
                      <br>
                    @endforeach

                </div>
                <form action="/getConversion" method="POST">
                {{ csrf_field() }}
              <input type="hidden" name="base" id="base" value="<?php echo $base; ?>">
              <?php
              foreach($conversion as $key => $value)
              {
                  echo '<input type="hidden" name="cur[]" value="'. $key. '">';
              }
              ?> 
              <input type="submit" name="Refresh" value="Refresh" />
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
