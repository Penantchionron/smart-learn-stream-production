<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('categorie')->latest()->get();
        return Inertia::render('Admin/videos/Index', [
            'videos' => $videos
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/videos/Create', [
            'categories' => Categorie::all()
        ]);
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_file' => 'nullable|file|mimes:mp4,mov,avi|max:204800',
        'url' => 'nullable|url',
        'youtube_id' => 'nullable|string',
        'categorie_id' => 'required|exists:categories,id',
        'premium' => 'required|boolean',
    ]);

    // Gestion de l’upload local si un fichier est fourni
    if ($request->hasFile('video_file')) {
        $path = $request->file('video_file')->store('videos', 'public');
        $validated['url'] = '/storage/' . $path;
    }

    Video::create($validated);

    return redirect()->route('videos.index')->with('success', 'Vidéo ajoutée avec succès');
}


    public function edit(Video $video)
    {
        return Inertia::render('Admin/videos/Update', [
            'video' => $video,
            'categories' => Categorie::all()
        ]);
    }

public function update(Request $request, Video $video)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_file' => 'nullable|file|mimes:mp4,mov,avi|max:204800',
        'url' => 'nullable|url',
        'youtube_id' => 'nullable|string',
        'categorie_id' => 'required|exists:categories,id',
        'premium' => 'required|boolean',
    ]);

    // Mise à jour du fichier si fourni
    if ($request->hasFile('video_file')) {
        $path = $request->file('video_file')->store('videos', 'public');
        $validated['url'] = '/storage/' . $path;
    }

    $video->update($validated);

    return redirect()->route('videos.index')->with('success', 'Vidéo mise à jour avec succès');
}


    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Vidéo supprimée avec succès');
    }
}
