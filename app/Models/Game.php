<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Game;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    
    public function scopeIndex($query) 
    {
        return $query;
    }
    
    public function scopeSearchTitle($query, $searchTerm)
    {
        return $query->where("name", 'LIKE', "%{$searchTerm}%");
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

}
