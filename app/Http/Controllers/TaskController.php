<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function view(Request $request)
    {
        die('view');
    }


    public function create(Request $request, $project)
    {
        $members = Member::where('project_id', $project)->get();
        return view('projects.dashboard.add-task', [
            'members' => $members,
            'project' => $project
        ]);
    }

    public function edit(Request $request, $project, $task)
    {
        $task = Task::find($task);
        $members = Member::where('project_id', $project)->get();
        return view('projects.dashboard.edit-task', [
            'task' => $task,
            'members' => $members
        ]);
    }

    public function store(Request $request, $project)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'assigned_to' => 'required'
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->deadline = $request->deadline;
        $task->project_id = $project;
        $task->save();
        return redirect()->route('projects.dashboard.all-tasks', ['project' => $project]);
    }


}
