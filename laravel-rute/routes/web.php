<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Services\MathService;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return 'Moja početna stranica';
});

//prva ruta

Route::get('/prva',function (){
    return 'Prvi prikaz';
});

Route::get('/druga',function (){
    return 'Rezultat: '.(3+2);
});

Route::get('/korisnik/edit', function(){
    return 'Editiranje korisnika';
});

Route::get('/proizvod/{id}',function ($id) {
    return "Proizvod ID: {$id}";
})->whereNumber('id');

Route::get('/knjige/{id?}',function ($id=null){

    if($id===null){
        return "Lista svih knjiga";
    }
    else
    {
        return "Knjiga id: {$id}";
    }

})->whereNumber('id');

Route::get('/html',function(){
    return '<h1>Pozdrav</h1><p>Ovo je prvi ispis</p>';
});

Route::get('/json',function(){
    return [
        'status'=>'success',
        'message'=>'Hello JSON',
        'year'=>date("Y")
    ];
});

Route::get('json-explicit', function(){
    return response()->json([
        'user'=>'Ivan',
        'role'=>'Admin'
    ]);

});


Route::get('/created', function(){
    return response('Created',201);
});

Route::get('/ok', function (){
    return response('OK',200);
})->name('ok');

// Route::get('/calc/zbroj/{a}/{b}', function (int $a, int $b, MathService $math){
//     return (string) $math->zbroj($a,$b);
// });

// Route::get('/calc/produkt/{a}/{b}', function (int $a, int $b, MathService $math){
//     return (string) $math->produkt($a,$b);
// });

Route::prefix('calc')->group(function () {

    Route::get('/zbroj/{a}/{b}', function (int $a, int $b, MathService $math){
        return (string) $math->zbroj($a,$b);
    });

    Route::get('/produkt/{a}/{b}', function (int $a, int $b, MathService $math){
        return (string) $math->produkt($a,$b);
    });

    Route::get('/razlika/{a}/{b}', function (int $a, int $b, MathService $math){
        return (string) $math->razlika($a,$b);
    });

    Route::get('/kvocijent/{a}/{b}', function (int $a, int $b, MathService $math){

        try{
            return (string) $math->kvocijent($a,$b);
        }
        catch(InvalidArgumentException $e){
            return response()->json(['error'=>$e->getMessage()],400);
        }
        
    });

    Route::get('/ostatak/{a}/{b}', function (int $a, int $b, MathService $math){

        try{
            return (string) $math->ostatak($a,$b);
        }
        catch(InvalidArgumentException $e){
            return response()->json(['error'=>$e->getMessage()],400);
        }
        
    });

});

Route::get('/demo', function (){
    return redirect()->route('ok');
});

Route::get('/download', function (){
    return response()->download(storage_path('app/test.txt'));
});

Route::prefix('admin')->group(function (){

    Route::get('/users', function (){
        return 'Admin users';
    });

    Route::get('/settings',function(){
        return 'Admin settings';
    });

    Route::get('/prava', function (){
        return response()->json([
            ['pravoid'=>1, 'naziv'=>'Pregled'],
            ['pravoid'=>2, 'naziv'=>'Brisanje']
        ]);
    });
});

Route::get('/categories', function() {
    $categories = [
        new Category(1,'Hrana'),
        new Category(2,'Vrt'),
        new Category(3,'Knjige')
    ];

    $output = "KATEGORIJE\n\n";
    foreach($categories as $c){
        $output.= "{$c->id}. {$c->name}\n";
    }

    return nl2br($output);
});

Route::get('/categories-json', function() {
    $categories = [
        new Category(1,'Hrana'),
        new Category(2,'Vrt'),
        new Category(3,'Knjige')
    ];

    return response()->json($categories);
});

Route::get('/products-json', function() {

    $food = new Category(1,'Food');
    $tech = new Category(2,'Technology');
    $books = new Category(3,'Books');

    $products = [
        new Product(1,'Bread',1.20,$food),
        new Product(2,'Milk',1.10,$food),
        new Product(3,'Keyboard',35.20,$tech),
        new Product(4,'Mouse',18.50,$tech),
        new Product(5,'Clean Code',29.90,$books),
    ];

    return response()->json($products);

});

Route::get('/products-list', function() {

    $food = new Category(1,'Food');
    $tech = new Category(2,'Technology');
    $books = new Category(3,'Books');

    $products = [
        new Product(1,'Bread',1.20,$food),
        new Product(2,'Milk',1.10,$food),
        new Product(3,'Keyboard',35.20,$tech),
        new Product(4,'Mouse',18.50,$tech),
        new Product(5,'Clean Code',29.90,$books),
    ];

    $output="<ul>";

    foreach($products as $p){
        $output.="<li>{$p->id}. {$p->name} | {$p->category->name} | {$p->price} EUR</li>";
    }

    $output.="</ul>";

    return nl2br($output,true);

});