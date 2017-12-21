<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function index(Request $request)
  {
    $tasks = Task::where('user_id',Auth::user()->id)->get();
    return view('tasks.index', compact('tasks'));

  }
  public function store(Request $request)
  {
    request()->validate([
            'name' => 'required',
    ]);
    if (Auth::check()) {
    $task = new Task();
    $task->user_id = Auth::user()->id;
    $task->name = $request->name;
    $task->save();
    return redirect('/tasks')->with('success','Task create successfully');
    }
  }
  
}
 