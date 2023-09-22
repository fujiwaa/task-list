<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use App\Models\StatusModel;
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
    public function create($userId) 
    {
        $user = UserModel::find($userId); 
        $statusTasks = StatusModel::where('id_user', $userId)->get();
        return view('task.add')->with([
            'user' => $user,
            'statusTasks' => $statusTasks,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_task' => 'required',
            'id_status_task' => 'required',
            'id_user' => 'required',
        ]);

        $idStatusTask = $request->input('id_status_task');
        $idUser = $request->input('id_user');

        $task = new TaskModel;
        $task->nama_task = $request->nama_task;
        $task->id_status_task = $idStatusTask;
        $task->id_user = $idUser;
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
            'status' => StatusModel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_task' => 'required|min:3',
            'id_status_task' => 'required|min:3',
            'id_user' => 'required',
        ]);
        
        $task = TaskModel::find($id);
        $task->nama_task = $request->nama_task;
        $task->id_status_task = $request->id_status_task;
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
