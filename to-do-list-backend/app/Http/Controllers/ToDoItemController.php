<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoItemReqest;
use App\Http\Requests\TodoItemUpdateRequest;
use App\Models\ToDoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToDoItemController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(ToDoItem::class, 'todo_item');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$todos = DB::table('to_do_items')->get();
      $todos = Auth::user()->todos;
      return response()->json($todos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToDoItemReqest $request)
    {
      $validated = $request->validated();

      $toDoItem = new ToDoItem();
      $toDoItem->title = $validated['title'];
      $toDoItem->description = $validated['description'] ?? NULL;
      $toDoItem->priority = $validated['priority'];
      $toDoItem->completed = $validated['completed'] ?? false;
      $toDoItem->user_id = $request->user()->id;
      $toDoItem->save();

      return response()->json($toDoItem, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoItem $todo_item)
    {
      return response()->json($todo_item, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDoItem $toDoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function update(TodoItemUpdateRequest $request, ToDoItem $todo_item)
    {
      $validated = $request->validated();

      $todo_item->title = $validated['title'] ?? $todo_item->title;
      $todo_item->description = $validated['description'] ?? $todo_item->description;
      $todo_item->priority = $validated['priority'] ?? $todo_item->priority;
      $todo_item->completed = $validated['completed'] ?? $todo_item->completed;
      $todo_item->save();

      return response()->json($todo_item, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDoItem $todo_item)
    {
      $todo_item->delete();
      return response()->json($todo_item, 200);
    }
}
