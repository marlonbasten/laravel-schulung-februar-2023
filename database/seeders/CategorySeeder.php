<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $categories = [
        [
            'name' => 'Allgemein',
        ],
        [
            'name' => 'Hilfe',
        ],
        [
            'name' => 'Technik',
        ]
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create($category);
        }
    }
}
