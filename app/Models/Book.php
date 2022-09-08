<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['title','desc'];
    
    public function categories(){


        return $this->belongsToMany('App\Models\Category');
    }


    use HasFactory;
}
