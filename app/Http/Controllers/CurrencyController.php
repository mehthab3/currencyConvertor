<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
// use Illuminate\Support\Facades\Input;


class CurrencyController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function currencyPost(Request $request){
    	
		Session::reflash();

    	// $inputData = \Input::all();
             // print_r($inputData);exit();
    	$base = request()->input('base');
    	$compareCur = request()->input('cur');
    	

    	// $leng = sizeof($compareCur);
    	// print_r($compareCur);exit();
    	// $i=1;
    	// for( $i; $i<=$leng; $i++  );
    	// {
    	// 	$compareCur[$i]=
    	// }
    	$request->session()->put('base',$base);
		// Session::set('cur', request()->input('cur'));

    	// $request->session()->put('base',$compareCur);
		Session::push('cur', $compareCur);
		// $data = Session::all();

		// $data = Session::all();
    	// print_r($data['cur']);exit();

    	$url = "https://api.exchangeratesapi.io/latest?base=".$base;
    	$getConvApi = file_get_contents($url);
    	$getConvApi= json_decode($getConvApi);

    	foreach ($compareCur as $curVal) {
    		$conversion[$curVal] = $getConvApi->rates->$curVal;
    	}
    	// print_r($getConvApi->rates->CAD);exit();
    	// print_r($conversion);exit();
    	return view('index',compact('conversion','base'));
    }

    public function editbase(){
    	
    	return view('editbase');

    }

    public function editbaseValue(Request $request){
    	
    	if (!empty(request()->input('base'))) {
    		$base = request()->input('base');
    	}
    	if (!empty(request()->input('cur'))) {
    		$compareCur = request()->input('cur');
    	}
    	else{
    		$data = Session::all();
    		$compareCur = end($data['cur']);
    	}

    	$request->session()->put('base',$base);
		Session::push('cur', $compareCur);

    	$url = "https://api.exchangeratesapi.io/latest?base=".$base;
    	$getConvApi = file_get_contents($url);
    	$getConvApi= json_decode($getConvApi);

    	foreach ($compareCur as $curVal) {
    		$conversion[$curVal] = $getConvApi->rates->$curVal;
    	}
    	return view('index',compact('conversion','base'));
    }

    public function editcv(){
    	
    	return view('editCurr');

    }

    public function editCurr(Request $request){
    	
    	if (!empty(request()->input('base'))) {
    		$base = request()->input('base');
    	}
    	else{
    		$data = Session::all();
    		$base = $data['base'];
    	}
    	if (!empty(request()->input('cur'))) {
    		$compareCur = request()->input('cur');
    	}
    	else{
    		$data = Session::all();
    		$compareCur = end($data['cur']);
    	}
			
    	$request->session()->put('base',$base);
		Session::push('cur', $compareCur);

    	$url = "https://api.exchangeratesapi.io/latest?base=".$base;
    	$getConvApi = file_get_contents($url);
    	$getConvApi= json_decode($getConvApi);

    	foreach ($compareCur as $curVal) {
    		$conversion[$curVal] = $getConvApi->rates->$curVal;
    	}
    	return view('index',compact('conversion','base'));
    }
    
}
