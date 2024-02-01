<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProjectController extends Controller
{
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
}
