<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\Project;



class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'deadline' => 'required|string|max:255', // 'date_format:Y-m-d
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $newFileName = Str::uuid() . '.' . $request->file('banner')->extension();

        // If there is a file with the name banner, then upload it
        if ($request->hasFile('banner')) {
            // Store it in storage/app/public and get the path
            $path = $request->file('banner')->storeAs('public', $newFileName);
        }

        $id = Str::uuid();

        $project = Project::create([
            'id' => $id,
            'name' => $validated['name'],
            'deadline' => $validated['deadline'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'user_id' => Auth::id(),
            'banner_image' => $newFileName,
        ]);

        if ($project) {
            return Redirect::route('projects.index');
        }
    }

    public function index(Request $request): View
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('projects.index', [
            'projects' => $projects
        ]);
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

    public function showKanban(Request $request, $project): View
    {
        return view('projects.dashboard.kanban', []);
    }

    public function showProjectMembers(Request $request, $project): View
    {
        return view('projects.dashboard.project-members', []);
    }

    public function addMember(Request $request, $project): View
    {
        return view('projects.dashboard.add-member', []);
    }

    public function allTasks(Request $request, $project): View
    {
        return view('projects.dashboard.all-tasks', []);
    }

    public function addTask(Request $request, $project): View
    {
        return view('projects.dashboard.add-task', []);
    }

    
}
