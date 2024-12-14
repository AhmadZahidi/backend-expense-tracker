<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'amount', 'date', 'description', 'category_id'];

    /**
     * Get the category associated with the expense.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
