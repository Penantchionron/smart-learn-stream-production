<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentaireController extends Controller
{
    /**
     * Affiche la liste des commentaires (avec pagination)
     */
    public function index()
    {
        return Inertia::render('Admin/commentaires/Index', [
            'commentaires' => Commentaire::latest()->paginate(10) // Pagination + tri récent
        ]);
    }

    /**
     * Supprime un commentaire
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with([
            'success' => 'Commentaire supprimé avec succès.'
        ]);
    }

    // Méthodes optionnelles (si nécessaires)
    public function show(Commentaire $commentaire)
    {
        return Inertia::render('Admin/commentaires/Show', [
            'commentaire' => $commentaire
        ]);
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate(['contenu' => 'required|string']);

        $commentaire->update($request->all());

        return back()->with('success', 'Commentaire mis à jour.');
    }
}
