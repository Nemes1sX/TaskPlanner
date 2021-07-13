<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->paginate(15);

        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
       return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request) : RedirectResponse
    {
        auth()->user()->tasks()->create($request->validated());

        return redirect(route('task.index'))->with('success', 'Task was updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) : View
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) : View
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $task) : RedirectResponse
    {
        $task->update($request->validated());

        return redirect(route('task.update'))->with('success', 'Task was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) : RedirectResponse
    {
        $task->delete();

        return redirect(route('task.index'))->with('success', 'Task was deleted');
    }

    public function start(Task $task) : RedirectResponse
    {
        if (!$task->start_time) {
           $task->start_time = Carbon::now();
        }
        $task->status = true;
        $task->save();

        return redirect()->back()->with('message', 'Task was started/resumed');
    }

    public function stop(Task $task) : RedirectResponse
    {
        $task->end_time = Carbon::now();
        $task->status = false;
        $task->save();

        return redirect()->back()->with('message', 'Task was stopped');
    }

}
