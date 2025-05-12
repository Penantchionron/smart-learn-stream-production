<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategorieController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/categories/Index', [
            'categories' => Categorie::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/categories/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255']);

        Categorie::create($request->only('nom'));

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès');
    }

    public function edit(Categorie $categorie)
    {
        return Inertia::render('Admin/categories/Edit', [
            'categorie' => $categorie
        ]);
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate(['nom' => 'required|string|max:255']);

        $categorie->update($request->only('nom'));

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
