<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

protected $fillable  =[
        'content',
        'user_id'
    ];

public function notes()
    {
        return $this ->belongsTo('App\Models\User');
    }
    use HasFactory;
}
