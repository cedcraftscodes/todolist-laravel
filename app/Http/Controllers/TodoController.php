<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();

        return view('todo.home', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $todo = new Todo;
        $this->validate($request, [
            'body' => 'required', 
            'title' => 'required|unique:todos',
        ]);
        $todo->body = $request->body;
        $todo->title = $request->title;
        $todo->save();
        session()->flash('message', 'Task Added!');
        return redirect('todo');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Todo::find($id);
        return view('todo.show', compact('item'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Todo::find($id);
        return view('todo.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $this->validate($request, [
            'body' => 'required', 
            'title' => 'required',
        ]);
        $todo->body = $request->body;
        $todo->title = $request->title;
        $todo->save();
        session()->flash('message', 'Update success!');
        return redirect('todo');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Todo::find($id);
        $item->delete();

        session()->flash('message', 'Delete success!');
        return redirect('todo');
    }
}
