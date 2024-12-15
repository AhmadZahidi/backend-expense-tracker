<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * Get all expenses associated with the category.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
