<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'completed', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createTodo($validated)
    {
        return self::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'completed' => false,
            'user_id' => Auth::id(),
        ]);
    }
}
