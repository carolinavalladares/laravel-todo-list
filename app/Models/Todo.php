<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Todo extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'user_id',
        'done',
        'important'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }


}