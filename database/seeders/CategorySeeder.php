<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Category::count() > 0){
            return;
        }

        $categoriesExamples = [
            [
                Category::NAME => 'Remessa Parcial',
                Category::CREATED_AT => now(),
                Category::UPDATED_AT => now(),
            ],
            [
                Category::NAME => 'Remessa',
                Category::CREATED_AT => now(),
                Category::UPDATED_AT => now(),
            ]
        ];

        // NOTA: Poderia ter utilizado o create também, para permitir que o Eloquent trate a atribuição automática dos valores dos campos created_at e updated_at.
        DB::table(Category::TABLE_NAME)->insert($categoriesExamples);
    }
}
