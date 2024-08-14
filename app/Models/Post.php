<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Gallery;
use App\Models\comment;

class Post extends Model
{
    use HasFactory;

    public const PUBLISHED = 1;
    public const DRAFT = 0;

    protected $fillable = ['gallery_id', 'user_id', 'category_id', 'title', 'description', 'status'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);        
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
    
    public function comments()
    {
        return $this->hasMAny(comment::class);
    }
}
