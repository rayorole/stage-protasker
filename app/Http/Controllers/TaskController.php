<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Member;
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
            'members' => $members
        ]);
    }
}
