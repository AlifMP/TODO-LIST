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
        $lists = $request->validate([
            'list_title' => 'required',
            'user_id' => 'required'
        ]);
        TodoList::create($lists);

        return redirect('/dashboard')->with('success', 'Todolist added successfully!');
    }
    public function detailList($id)
    {
        $lists = DB::table('lists')->where('id', $id)->get();
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
