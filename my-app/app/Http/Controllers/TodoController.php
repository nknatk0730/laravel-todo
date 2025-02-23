<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // ユーザーのホーム画面
    public function home()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $todos = Todo::where('user_id', Auth::id())->get();

        return view('todos.home', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                // description nullable max255
                'description' => 'nullable|string|max:255',
            ]);
    
            Todo::createTodo($validated);

            return redirect()->route('todo.home');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Todo $todo)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        if ($todo->user_id !== Auth::id()) {
            return redirect(route('todo.home'));
        }

        return view('todos.edit', ['todo' => $todo]);
    }
    
    public function update(Request $request, Todo $todo)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        if ($todo->user_id !== Auth::id()) {
            return redirect(route('todo.home'));
        }

        try {
            $todo->completedTodo($todo);

            return redirect()->route('todo.home');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Todo $todo)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        if ($todo->user_id !== Auth::id()) {
            return redirect(route('todo.home'));
        }

        try {
            $todo->delete();

            return redirect()->route('todo.home');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
