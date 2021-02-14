<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Comment extends Model
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "comments";
    protected $fillable = ['user_id','module','module_field_id','comment','comment_replay_id','attachment', 'created_at','updated_at','deleted_at'];
}
