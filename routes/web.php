<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::orderBy('id', 'asc')->paginate(),
        'progress' => Task::countProgress()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

// Get data for edit
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

// Show data
Route::get('/tasks/{task}', function (task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

// Store data
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

// Edit data
Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully');
})->name('tasks.update');

// Delete data
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully');
})->name('tasks.toggle-complete');
