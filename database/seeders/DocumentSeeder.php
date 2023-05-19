<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Document::count() > 0){
            return;
        }

        $documentsExamples = [
            [
                Document::CATEGORY_ID => 1,
                Document::TITLE => 'teste titulo - relação 1',
                Document::CONTENTS => 'teste conteudo - relação 1',
                Document::CREATED_AT => now(),
                Document::UPDATED_AT => now(),
            ],
            [
                Document::CATEGORY_ID => 2,
                Document::TITLE => 'teste titulo - relação 2',
                Document::CONTENTS => 'teste conteudo - relação 2',
                Document::CREATED_AT => now(),
                Document::UPDATED_AT => now(),
            ]
        ];

        // NOTA: Poderia ter utilizado o create também, para permitir que o Eloquent trate a atribuição automática dos valores dos campos created_at e updated_at.
        DB::table(Document::TABLE_NAME)->insert($documentsExamples);
    }
}
