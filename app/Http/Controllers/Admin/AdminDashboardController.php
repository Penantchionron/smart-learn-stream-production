<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
        'name' => \Illuminate\Support\Facades\Auth::user()->name, // Récupère le nom de l'utilisateur connecté
    ]);

}
}
