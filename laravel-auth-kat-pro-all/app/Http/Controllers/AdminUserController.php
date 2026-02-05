<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;
class AdminUserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('id')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'datumrod' => ['nullable', 'date', 'before:today'],
            'usertype' => ['required', 'in:0,1'],
        ]);

        $user->update($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'Korisnik je uspješno ažuriran.');
    }

    public function destroy(User $user): RedirectResponse
    {
        // dodatna sigurnost (server-side)
        if ($user->id === auth()->id()) {
            abort(403, 'Ne možete obrisati sami sebe.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'Korisnik je uspješno obrisan.');
    }
}
