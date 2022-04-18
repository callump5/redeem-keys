<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Collection;

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


    // Set up relationships
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function collections(){
        return $this->belongsToMany(Collection::class);
    }

}
