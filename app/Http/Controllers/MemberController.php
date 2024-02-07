<?php

namespace App\Http\Controllers;

//make the member controler

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'role' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);


        $memberFromUser = User::where('email', $validated['email'])->first();
        if (!$memberFromUser) {
            return Redirect::route('projects.index');
        }

        $member = Member::create([
            'role' => $validated['role'],
            'function' => $validated['function'],
            'project_id' =>$id,
            'user_id' => $memberFromUser->id,
        ]);

        if (! $member) {
            return redirect()->back()->withErrors('Could not create member.');
        }

        return Redirect::route('projects.dashboard.project-members', ['project' => $id]);
    }


    public function index(Request $request): View
    {
        $members = Member::where('user_id', Auth::id())->get();
        return view('members.index', [
            'members' => $members
        ]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        $tasks = Task::where('project_id', $id)->get();
        $comments = Comment::where('project_id', $id)->get();
        $members = DB::table('members')
            ->join('users', 'members.user_id', '=', 'users.id')
            ->select('members.*', 'users.name')
            ->where('members.project_id', $id)
            ->get();
        return view('projects.show', [
            'project' => $project,
            'tasks' => $tasks,
            'comments' => $comments,
            'members' => $members
        ]);
    }

    public function edit($id, $member_id)
    {
        $member = Member::find($member_id);
        return view('projects.dashboard.edit-member', [
            'member' => $member,
            'project' => $id
        ]);
    }

    public function update(Request $request, $id, $member): RedirectResponse
    {
        $member = Member::find($member);
        $member->role = $request->role;
        $member->function = $request->function;
        $member->save();
        return Redirect::route('projects.dashboard.project-members', [
            'project' => $id
        ]);
    }

    public function destroy($id, $member): RedirectResponse
    {
        $member = Member::find($member);
        $member->delete();
        return Redirect::route('projects.dashboard.project-members', [
            'project' => $id
        ]);
    }
}
