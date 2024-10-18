<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    //IF WE ARE USING CREATE WE HAVE TO USE EITHER FILLABLE OF GUARDED AND LEAVE IT AS AN EMPTY ARRAY
    protected $fillable=['title','description'];  //OR
    // protected $guarded=[]; //and i can add the one that i want to keep guarded in the array
}
