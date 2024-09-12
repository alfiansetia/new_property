<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Rumah',
            'Lahan',
            'Gedung',
            'Apartemen',
            'Gudang',
        ];

        foreach ($categories as $item) {
            Category::create([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
        }
    }
}
