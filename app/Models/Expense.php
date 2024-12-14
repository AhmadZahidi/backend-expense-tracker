<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'amount', 'date', 'description'];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }
}
