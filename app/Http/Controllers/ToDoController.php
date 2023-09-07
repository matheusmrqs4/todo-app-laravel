<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user()->id;

        $todos = ToDo::where('users_id', $user)->orderBy('created_at', 'desc')->paginate(10);
        return view('todo.index', ['todos' => $todos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('todo.create', ['request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'description' => 'required|max:500',

            ],
            [
                'required' => 'O campo precisa ser Preenchido!',
                'description.max' => 'Ultrapassou o número máximo de caracteres!'
            ]
        );

        date_default_timezone_set('America/Sao_Paulo');

        $todo = new ToDo();
        $todo->description = $request->description;
        $todo->done = $request->done;
        $todo->users_id = Auth::user()->id;
        $todo->save();

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $todo)
    {

        $todo->update($request->all());
        return redirect()->route('todos.show', ['todo' => $todo->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
