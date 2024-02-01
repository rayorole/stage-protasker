<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);


        // $project = Auth::user()->projects()->create([
        //     'name' => $validated['name'],
        //     'description' => $validated['description'],
        //     'type' => $validated['type'],
        //     'status' => $validated['status'],
        //     'url' => $validated['url'],
        //     'id' => Str::uuid(),
        // ]);
    }

    public function index(Request $request): View
    {
        return view('projects.index', []);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function showDashboard(Request $request, $project): View
    {
        return view('projects.dashboard.index', []);
    }

    public function showSettings(Request $request, $project): View
    {
        return view('projects.dashboard.settings', []);
    }
}
