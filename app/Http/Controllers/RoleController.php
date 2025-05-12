<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/roles/Index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/roles/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        Role::create($request->only('nom'));

        return redirect()->route('roles.index')->with('success', 'Rôle ajouté avec succès');
    }

    public function edit(Role $role)
    {
        return Inertia::render('Admin/roles/Edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        $role->update($request->only('nom'));

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rôle supprimé');
    }
}
