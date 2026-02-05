<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function jsonResponse(){
        return response()->json([
            'status'=>'ok',
            'message'=>'Response 2 - JSON preko kontrolera radi',
            'time'=>now()->toDateTimeString(),
        ],200);
    }

    public function jsonWithHeaders(){

        return response()->json([
            'status'=>'ok',
            'message'=>'Response 3 - JSON response sa headerima',
        ],200)
        ->header('X-App-Version','1.0')
        ->header('X-Debug','true');
    }

    public function redirectWithFlash(){
        return redirect('/')->with('success','Response 4 - uspješno preusmjeren');
    }

    public function noContent(){
        return response()->noContent();
    }
}
