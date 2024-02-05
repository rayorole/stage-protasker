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
use App\Models\Member;
use App\Models\Task;



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

        $project = Project::create([
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
        $assigned_tasks = Task::where('project_id', $project)->where('assigned_to', Auth::id())->get();
        return view('projects.dashboard.index', [
            'project' => $project,
            'assigned_tasks' => $assigned_tasks
        ]);
    }

    public function showSettings(Request $request, $project): View
    {
        $projectData = Project::where('id', $project)->first();
        return view('projects.dashboard.settings', [
            'id' => $project,
            'project' => $projectData
        ]);
    }

    public function showKanban(Request $request, $project): View
    {
        return view('projects.dashboard.kanban', [
            'project' => $project
        ]);
    }

    public function showProjectMembers(Request $request, $project): View
    {
        $members = Member::where('project_id', $project)->get();
        return view('projects.dashboard.project-members', [
            'members' => $members,
            'project' => $project
        ]);
    }

    public function addMember(Request $request, $project): View
    {

        return view('projects.dashboard.add-member', [
            'project' => $project
        ]);
    }



    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'deadline' => 'required|string|max:255', // 'date_format:Y-m-d
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);



        // If there is a file with the name banner, then upload it
        if ($request->hasFile('banner')) {
            // Store it in storage/app/public and get the path
            $newFileName = Str::uuid() . '.' . $request->file('banner')->extension();
            $path = $request->file('banner')->storeAs('public', $newFileName);
        }

        Project::where('id', $validated['id'])->update([
            'name' => $validated['name'],
            'deadline' => $validated['deadline'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'user_id' => Auth::id(),
            'banner_image' => $newFileName ?? null,
        ]);


        return Redirect::route('projects.dashboard.settings', ['project' => $validated['id']]);
    }
}
