<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\alert;

class TaskController extends Controller
{
// return view
    public function index(){

        $tasks = Task::orderBy('completed_at') -> orderBy('id','DESC') -> get();
        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }
// create 
    public function create(){
        return view('tasks.create');
    }
//store
    public function store(){

        request()->validate([
            'description' => 'required|max:255',
        ]);

        $task = Task::create([
            'description' => request('description'),
        ]);

        return redirect('/');
    }
//update
    public function update($id){
        $tasks = Task::where('id', $id)->first();

        $tasks->completed_at = now();
        $tasks->save();
        return redirect('/');
    }
//delete
    public function delete($id){
        $tasks = Task::where('id', $id)->first();
        $tasks->delete();
        alert('success');
        return redirect('/');
    }
//edit
    public function edit($id){
        $tasks = Task::find($id);
        return view('tasks.edit',compact('tasks'));
    }
//edit save
    public function editdata(Request $request,$id){
        $tasks = Task::find($id);
        $tasks->description = $request->input('editedDescription');
        $tasks->update();
        return redirect('/');
    }

    
}
