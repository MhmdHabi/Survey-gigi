<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Pengetahuan', 'Sikap', 'Tindakan'];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]); // Cegah duplikasi kategori jika sudah ada
        }
    }
}
