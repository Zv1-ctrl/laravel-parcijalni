<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request){
        $sort = $request->query('sort','name');
        $dir = $request->query('dir','asc');

        return response("R1 response OK -> sort={$sort}, dir={$dir}",200);
    }

    //query parametar: ?sort=price
    //route parametar: /products/10
    public function show(Request $request){
        $id = $request->route('id');
        return response("R2 response OK -> Traženi id je {$id}",200);
    }

    public function store(Request $request){

        //svi podaci poslani u requestu
        $all = $request->all();

        //jedan konkretan podatak
        $name = $request->input('name');

        //određeni podaci - ključevi
        $only = $request->only('name','price','category');

        //svi osim navedenog
        $except = $request->except('_token');

        $hasName = $request->has('name');//da li je poslano?
        $filledName = $request->filled('name');//da li je stvarno popunjeno?

        return response()->json([
            "R3 response" => [
                'all'=>$all,
                'name'=>$name,
                'only'=>$only,
                'except'=>$except
            ],
            "R4 Response" => [
                'has_name'=>$hasName,
                'filled_name'=>$filledName,
                'name_value'=>$name,
            ]
        ], 200);
    }

    public function debugRequest(Request $request){
        
        return response()->json([
            'method' => $request->method(),
            'ip'=>$request->ip(),
            'url'=>$request->url(),
            'path'=>$request->path(),

            'headers'=>[
                'accept'=>$request->header('Accept'),
                'content_type'=>$request->header('Content-Type'),
                'user_agent'=>$request->userAgent(),
                'x_test'=>$request->header('X-Test'),
            ],
        ],200);
    }

    public function storeValidated(Request $request){

        $validated = $request->validate([
            'name'=>['required','string','min:3'],
            'price' => ['required','numeric','min:0.01'],
            'category'=>['required','string','max:8'],
        ]);

        //ako validacija prođe
        return response()->json([
            'message' => 'Response 6 - Validacija uspješna',
            'data'=>$validated
        ],200);
    }

    public function storeUserValidated(Request $request){

        $validated = $request->validate([
            'email'=>['required','email'],
            'age' => ['required','integer','between:18,65'],
            'gender'=>['required','in:male,female'],
        ]);

        //ako validacija prođe
        return response()->json([
            'message' => 'Response 7 - Validacija uspješna',
            'data'=>$validated
        ],200);
    }

    public function storeBasicValidated(Request $request){

        $validated = $request->validate([
            'title'=>['required','string','min:3','max:20'],
            'quantity' => ['required','integer','min:1','max:100'],
            'description'=>['required','string','min:5','max:100'],
        ]);

        //ako validacija prođe
        return response()->json([
            'message' => 'Response 8 - Validacija uspješna',
            'data'=>$validated
        ],200);
    }

    public function showForm(){

        return response("
        <h1>Unos vozila</h1>

        <form method='POST' action='/api/vehicle/store'>
        <label>Marka:</label><br>
        <input type='text' name='marka'><br>

        <label>Model:</label><br>
        <input type='text' name='model'><br>

        <label>Godina:</label><br>
        <input type='text' name='godina'><br>


        <button type='submit'>Pošalji</button>
        </form>
        ");
    }

    public function storeCar(Request $request){

        $marka=$request->input('marka');
        $model=$request->input('model');
        $godina=$request->input('godina');

        return response("
        <h1>Zaprimljeni podaci</h1>

        <b>Marka: $marka</b>
        <b>Model: $model</b>
        <b>Godina: $godina</b>
        ");
    }
}
