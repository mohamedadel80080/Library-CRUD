<?php

namespace App\Models;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];


    public function books(){


        return $this->belongsToMany('App\Models\Book');
    }
    use HasFactory;
}
