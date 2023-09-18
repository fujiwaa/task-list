<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datatask = ['task' => TaskModel::all()];
        $datauser = ['user' => UserModel::all()];
        return view('task.index', $datatask, $datauser);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view('task.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_task' => 'required',
            'status_task' => 'required',
            'id_user' => 'required',
        ]);
        
        $task = new TaskModel;
        $task->nama_task = $request->nama_task;
        $task->status_task = $request->status_task;
        $task->id_user = $request->id_user;
        $task->save();

        return to_route('task.index')->with('task-success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('task.edit')->with([
            'task' => TaskModel::find($id),
            'user' => UserModel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_task' => 'required|min:3',
            'status_task' => 'required|min:3',
            'id_user' => 'required',
        ]);
        
        $task = TaskModel::find($id);
        $task->nama_task = $request->nama_task;
        $task->status_task = $request->status_task;
        $task->id_user = $request->id_user;
        $task->save();

        return to_route('task.index')->with('task-success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = TaskModel::find($id);
        $task->delete();

        return back()->with('task-success', 'Data berhasil dihapus!');
    }
}
