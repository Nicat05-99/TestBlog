<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#use App\Models\Post\PostTranslations;

class Post extends Model
{
    use HasFactory;
    protected $table='post';
    public $timestamps = false;
    protected $fillable=['image','status'];


    public function translations(){

        return $this->hasMany(PostTranslations::class,'post_id');
    }
}
