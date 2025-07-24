<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $employees = Employee::get();

        return view('tasks.create', [
            'employees' => $employees,
        ]);
    }

    public function store(TaskRequest $request)
    {

        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}
