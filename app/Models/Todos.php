<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todos extends Model
{
    protected $table = 'todos';

    protected $guarded = [
        'id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function todolist()
    {
        return $this->belongsTo(Todolist::class);
    }
}
