<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function create(Request $request, $project)
    {
        $members = Member::where('project_id', $project)->get();
        return view('projects.dashboard.add-task', [
            'members' => $members,
            'project' => $project
        ]);
    }

    public function view(Request $request, $project)
    {
        $tasks = Task::where('project_id', $project)->get();
        return view('projects.dashboard.all-tasks', [
            'project' => $project,
            'tasks' => $tasks
        ]);
    }

    public function edit(Request $request, $project, $task)
    {
        $task = Task::find($task);
        $members = Member::where('project_id', $project)->get();
        return view('projects.dashboard.edit-task', [
            'task' => $task,
            'members' => $members,
            'project' => $project

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

    public function update(Request $request, $project, $task)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'assigned_to' => 'required'
        ]);

        $task = Task::find($task);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->deadline = $request->deadline;
        $task->project_id = $project;
        $task->save();
        return redirect()->route('projects.dashboard.all-tasks', ['project' => $project]);

    }

    public function destroy(Request $request, $project, $task)
    {
        $task = Task::find($task);
        $task->delete();
        return redirect()->route('projects.dashboard.all-tasks', ['project' => $project]);
    }

}
