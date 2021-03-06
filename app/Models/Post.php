<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;
    use Sluggable;
    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'images', 'categorie_id', 'slug'];
    public function category() {
        return $this->belongsTo( Category::class );
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    public function comment() {
        return $this->hasMany( Comment::class);
    }
}
