<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategorijaController extends Controller
{
    public function index(): View
    {
        $kategorije = Kategorija::orderBy('id')->get();

        return view('kategorije.index', [
            'kategorije' => $kategorije,
        ]);
    }

    // CREATE forma - samo admin
    public function create(): View
    {
        return view('kategorije.create');
    }

    // STORE - samo admin
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:150'],
            'aktivna' => ['required', 'in:0,1'],
        ]);

        Kategorija::create([
            'naziv' => $validated['naziv'],
            'aktivna' => (bool)$validated['aktivna'],
        ]);

        return redirect()
            ->route('kategorije.index')
            ->with('status', 'Kategorija je uspješno dodana.');
    }

    // EDIT forma - samo admin
    public function edit(Kategorija $kategorija): View
    {
        return view('kategorije.edit', [
            'kategorija' => $kategorija,
        ]);
    }

    // UPDATE - samo admin
    public function update(Request $request, Kategorija $kategorija): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:150'],
            'aktivna' => ['required', 'in:0,1'],
        ]);

        $kategorija->update([
            'naziv' => $validated['naziv'],
            'aktivna' => (bool)$validated['aktivna'],
        ]);

        return redirect()
            ->route('kategorije.index')
            ->with('status', 'Kategorija je uspješno ažurirana.');
    }

    // DELETE - samo admin
    public function destroy(Kategorija $kategorija): RedirectResponse
    {
        $kategorija->delete();

        return redirect()
            ->route('kategorije.index')
            ->with('status', 'Kategorija je uspješno obrisana.');
    }
}
