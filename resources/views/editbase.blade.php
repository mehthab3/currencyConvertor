



@extends('layouts.app')

@section('content')
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


            <label for="base">Select Base Currency:</label>
            <form action="/editbaseValue" class="form-group" method="POST">
            {{ csrf_field() }}

            <select name="base" id="base">
              <option value="INR" >INR </option>
              <option value="JPY">JPY</option>
              <option value="USD">USD</option>
            </select>
           
              <input type="submit" value="Submit">
            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
