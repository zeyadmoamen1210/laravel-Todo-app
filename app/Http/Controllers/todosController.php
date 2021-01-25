<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class todosController extends Controller
{
    //
    public function __construct()
    {
        // echo "This is Constructor".'<br/>';
    }
    public function index(){
        // echo "Hello From Todos Controller".'<br/>';
        // Access Model Class

        $todos = Todo::all();
        // return view("todos")->with('todos',$todos);
        return view("todos/index", compact('todos'));
    }

    public function show($todo){

        return view('todos/show')->with('todo', Todo::find($todo));
    }

    public function create(){
        return view('todos/create');
    }

    public function store(Request $req){ // Dependancy Injection

        $req->validate([
            'todoTitle' => 'required',
            'todoDescription' => 'required'
        ]);

        $todo = new Todo();
        $todo->title = $req->todoTitle;
        $todo->description = $req->todoDescription;
        $todo->save();

        session()->flash('accept', 'Todo Added Successfully');

        return redirect('/todos');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        session()->flash('accept', 'Todo Deleted Successfully');
        return redirect('/todos');
    }

    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('accept', "Todo {$todo->title} Is Completed ");
        return redirect('/todos');
    }

    public function update(Todo $todo){
        return view('todos/update', compact('todo', $todo));
    }

    public function saveUpdate(Todo $todo, Request $req){
        $req->validate([
            'todoTitle' => 'required',
            'todoDescription' => 'required'
        ]);

        $todo->title = $req->get('todoTitle');
        $todo->description = $req->get('todoDescription');
        $todo->save();

        $req->session()->flash("accept", "Todo Updated Successfully");

        return redirect('/todos');
    }
}
