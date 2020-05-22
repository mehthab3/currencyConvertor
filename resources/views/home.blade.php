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
            <form action="/getConversion" class="form-group" method="POST">
            {{ csrf_field() }}

            <select name="base" id="base">
              <option value="INR">INR</option>
              <option value="JPY">JPY</option>
              <option value="USD">USD</option>
            </select>
            <br>
            <br>
            <label for="cars">Select Currencies to compare: </label>
            <br>
            
              <input type="checkbox" id="cur" name="cur[]" value="INR">
              <label for="vehicle1"> INR</label><br>
              <input type="checkbox" id="cur" name="cur[]" value="JPY">
              <label for="vehicle2">JPY</label><br>
              <input type="checkbox" id="cur" name="cur[]" value="USD">
              <label for="vehicle3"> USD</label><br><br>
              <input type="submit" value="Submit">
            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
