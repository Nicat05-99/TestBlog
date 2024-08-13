<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslations extends Model
{
    use HasFactory;
    protected $fillable=['post_id','lang_code','title','article'];

    
}
