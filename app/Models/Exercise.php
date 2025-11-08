<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
  protected $fillable = [
    'title',
    'category_id',
    'description',
    'solution',
    'output'
];


     public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
