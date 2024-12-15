<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed categories
        $categories = [
            ['id' => 12, 'name' => 'house rental'],
            ['id' => 11, 'name' => 'gadget purchase'],
            ['id' => 14, 'name' => 'tuition fee'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Seed expenses
        $expenses = [
            [
                'title' => 'Purchasing new headphones',
                'date' => Carbon::now()->subDays(2),
                'description' => 'Bought new headphones',
                'category_id' => 11,
                'amount' => 500,
            ],
            [
                'title' => 'Pay to house owner',
                'date' => Carbon::now()->subDays(1),
                'description' => '',
                'category_id' => 12,
                'amount' => 5000,
            ],
            [
                'title' => 'Paying tuition fee',
                'date' => Carbon::now(),
                'description' => '',
                'category_id' => 14,
                'amount' => 4000,
            ],
        ];

        foreach ($expenses as $expense) {
            Expense::create($expense);
        }

        User::create([
            "name"=>"zahidi",
            "email"=>"zahidi@email.com",
            "password"=>"12345678",
        ]);
    }
}
