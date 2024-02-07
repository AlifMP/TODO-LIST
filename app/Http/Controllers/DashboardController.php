<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $lists = TodoList::all();
        // $user = TodoList::with('user')->get();
        return view('landing.dashboard', [
            'title' => 'Dashboard',
            'lists' => $lists,
            // 'user' => $user
        ]);
    }
    public function createList(Request $request)
    {
        $validatedData = $request->validate([
            'list_title' => 'required',
            'user_id' => 'required'
        ]);
        //create data lists
        $list = TodoList::create($validatedData);

        //get id from lists
        $listId = $list->id;

        //also create data todos
        $todo = Todos::create([
            'todo_id' => $listId,
            'user_id' => $validatedData['user_id']
        ]);

        return redirect('/dashboard')->with('success', 'Todolist added successfully!');
    }
    public function detailList($id)
    {
        // $lists = DB::table('lists')->where('id', $id)->get();
        $lists = DB::table('todos')->join('lists', 'todos.todo_id', '=', 'lists.id')
            ->join('users', 'todos.user_id', '=', 'users.id')
            ->select('todos.*', 'lists.*', 'users.*')
            ->where('lists.id', $id)->get();
        return view('landing.detail', [
            'title' => 'Detail',
            'lists' => $lists
        ]);
    }
    public function deleteList($id)
    {
        DB::table('lists')->where('id', $id)->delete();
        return redirect('/dashboard')->with('success', 'Todolist deleted successfully!');
    }
}
