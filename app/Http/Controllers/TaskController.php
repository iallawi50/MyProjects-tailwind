<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Project $project)
    {
        abort_if(auth()->user()->id != $project->user_id, 403);

        $data = request()->validate([
            'body' => 'required'
        ]);

        $data['project_id'] = $project->id;

        Task::create($data);
        return back();
    }

    public function update(Project $project, Task $task)
    {

        abort_if(auth()->user()->id != $project->user_id, 403);

        $task->update([
            'done' => request()->has("done")
        ]);
        return back();
    }
    public function destroy(Project $project, Task $task)
    {
        abort_if(auth()->user()->id != $project->user_id, 403);
        $task->delete();
        return redirect('/projects/' . $project->id);
    }
}
