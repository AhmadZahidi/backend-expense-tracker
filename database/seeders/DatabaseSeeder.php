<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Expense;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Categories array
        $categories = [
            ['id' => 11, 'category_type' => 'expense', 'name' => 'gadget purchase'],
            ['id' => 12, 'category_type' => 'expense', 'name' => 'house rental'],
            ['id' => 13, 'category_type' => 'expense', 'name' => 'car rental'],
            ['id' => 14, 'category_type' => 'expense', 'name' => 'tuition fee'],
            ['id' => 15, 'category_type' => 'expense', 'name' => 'exam fee'],
            ['id' => 16, 'category_type' => 'expense', 'name' => 'travel'],
            ['id' => 17, 'category_type' => 'expense', 'name' => 'food purchase'],
            ['id' => 18, 'category_type' => 'expense', 'name' => 'refreshment'],
            ['id' => 19, 'category_type' => 'expense', 'name' => 'gift'],
            ['id' => 20, 'category_type' => 'expense', 'name' => 'buying software'],
            ['id' => 21, 'category_type' => 'expense', 'name' => 'investment'],
            ['id' => 22, 'category_type' => 'expense', 'name' => 'donation'],
        ];

        // Seed categories first
        foreach ($categories as $category) {
            Category::create($category);
        }

        // Expenses array
        $expenses = [
            ['title' => 'Purchasing new headphone', 'date' => '2023-08-02', 'description' => '', 'category_id' => 11, 'amount' => 500],
            ['title' => 'Pay to house owner', 'date' => '2023-08-03', 'description' => '', 'category_id' => 12, 'amount' => 5000],
            ['title' => 'Paying tuition fee of university', 'date' => '2023-08-08', 'description' => '', 'category_id' => 14, 'amount' => 4000],
            ['title' => 'Paying class test exam fee', 'date' => '2023-08-10', 'description' => '', 'category_id' => 15, 'amount' => 2540],
            ['title' => 'Visiting zoo with family', 'date' => '2023-08-12', 'description' => '', 'category_id' => 16, 'amount' => 1600],
            ['title' => 'Purchasing snacks for party', 'date' => '2023-08-17', 'description' => '', 'category_id' => 17, 'amount' => 1500],
            ['title' => 'Purchasing new soccer ball', 'date' => '2023-08-19', 'description' => '', 'category_id' => 18, 'amount' => 750],
            ['title' => 'Renew software license', 'date' => '2023-08-28', 'description' => '', 'category_id' => 20, 'amount' => 4500],
        ];

        // Seed expenses
        foreach ($expenses as $item) {
            Expense::create($item);
        }

        // Add a specific expense
        $today = Carbon::now();
        Expense::create([
            'title' => 'Donate to Charity',
            'date' => $today,
            'description' => '',
            'category_id' => 22,
            'amount' => 2800,
        ]);

        User::create([
            'name'=>'zahidi',
            'email'=>'zahidi@email.com',
            'password'=>'12345678',
        ]);
    }
}
