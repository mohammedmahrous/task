<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{

    use SoftDeletes;
    protected $fillable = ['title', 'content','status'];
    protected $date = ['delete_at'];
    
}
