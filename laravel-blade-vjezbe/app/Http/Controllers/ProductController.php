<?php

namespace App\Http\Controllers;
use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    private string $path = 'proizvodi.json';
    public function showVariables() {
        $naziv="Laptop";
        $kolicina=5;
        $cijena=rand(500,1500);

        return view('proizvod', [
            'naziv'=>$naziv,
            'kolicina'=>$kolicina,
            'cijena'=>$cijena
        ]);
    
    }

    public function list() {
        $proizvodi = [
            new Proizvod(1, "Laptop", 5, 1200, "2025-12-31"),
            new Proizvod(2, "Miš", 20, 25, "2024-11-30"),
            new Proizvod(3, "Tipkovnica", 10, 120, "2026-01-15"),
            new Proizvod(4, "Monitor", 8, 120, "2029-01-15"),
            new Proizvod(5, "Zvučnik", 20, 50, "2027-01-15"),
        ];

        return view('proizvodi', [
            'proizvodi' => $proizvodi
        ]);
    }

    public function listCards() {
        $proizvodi = [
            new Proizvod(1, "Laptop", 5, 1200, "2025-12-31"),
            new Proizvod(2, "Miš", 20, 25, "2024-11-30"),
            new Proizvod(3, "Tipkovnica", 10, 120, "2026-01-15"),
            new Proizvod(4, "Monitor", 8, 120, "2029-01-15"),
            new Proizvod(5, "Zvučnik", 15, 50, "2027-01-15"),
        ];

        return view('proizvodi-card', [
            'proizvodi' => $proizvodi
        ]);
    }   

    public function create() {
        $nextId = $this->vratiSljedeciIdProizvoda();
        return view('proizvodi-create', ['nextId' => $nextId]);
    }

    public function store(Request $request) {


        $errors=[];

        try{
            $validated = $request->validate([
                'id'=>['required','integer'],
                'naziv'=>['required','string','min:2'],
                'kolicina'=>['required','integer','min:1'],
                'cijena'=>['required','numeric','between:1,2000'],
                'rokisteka'=>['required','string'],
                'slika'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            ]);

        }
        catch(ValidationException $e){
            $errors = $e->errors();
        }

        $putanjaSlike = null;

        if($request->hasFile('slika')) {
            $file=$request->file('slika');

            $imeSlike=time().'_'.$file->getClientOriginalName();

            $file->move(\public_path('uploads'), $imeSlike);

            $putanjaSlike = 'uploads/'.$imeSlike;
        }

        $naziv = $request->input('naziv');

        if($naziv){
            $firstChar = mb_substr($naziv,0,1);
            if($firstChar !== mb_strtoupper($firstChar)){
                $errors['naziv'][] = 'Naziv proizvoda mora počinjati velikim slovom.';
            }
        }

        if(!empty($errors)) {
            $html = '<h2>Greška validacije</h2>';
            $html .= '<ul>';

            foreach($errors as $field=>$messages) {
                foreach($messages as $msg) {
                    $html .= "<li><b>{$field}:</b> {$msg}</li>";
                }
            }

            $html .= "</ul>";

            return response ($html, 422);
        }

        $proizvod = [
            'id'=>$validated['id'],
            'naziv'=>$validated['naziv'],
            'kolicina'=>$validated['kolicina'],
            'cijena'=>$validated['cijena'],
            'rokisteka'=>$validated['rokisteka'],
            'slika'=>$putanjaSlike,
        ];

        $proizvodi = [];
        
        if(Storage::exists('proizvodi.json')) {
            $proizvodi = json_decode(Storage::get('proizvodi.json'));
        }
        $proizvodi[] = $proizvod;
        Storage::put('proizvodi.json', json_encode($proizvodi,JSON_PRETTY_PRINT | \JSON_UNESCAPED_UNICODE));

        //return redirect('/proizvodi/json')
        //    ->with('success', 'Proizvod je uspješno spremljen!');
        return redirect(route('proizvodi.json'))
            ->with('success', 'Proizvod je uspješno spremljen!');

    }

    public function jsonList() {
        $proizvodi = [];
        
        if(Storage::exists('proizvodi.json')) {
            $proizvodi = json_decode(Storage::get('proizvodi.json'),true);
        }

        return view('proizvodi-json', ['proizvodi' => $proizvodi]);
    }

    public function contactCreate() {
        return view('contact-create');
    }

    public function vratiSljedeciIdProizvoda(): int{

        if(!Storage::exists($this->path)){
            return 1;
        }

        $raw = Storage::get($this->path);
        $data = json_decode($raw,true);

        $maxId=0;
        foreach($data as $v){
            $maxId=max($maxId, (int)($v['id'] ?? 0));
        }
        $newId = $maxId+1;

        return $newId;
    }
}