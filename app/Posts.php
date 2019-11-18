<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Posts extends Model
{

    use SoftDeletes;
    protected $fillable =['title','img_url','content','added_by'];
    protected $date=['delete_at'];


    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }
}
