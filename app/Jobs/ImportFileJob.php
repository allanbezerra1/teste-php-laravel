<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ImportFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected String $file;

    /**
     * Create a new job instance.
     *
     * @param String $file
     */
    public function __construct(String $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $content = Storage::get($this->file);
        $data = json_decode($content, true);

        foreach ($data['documentos'] as $record) {
            $category = Category::where(Category::NAME, $record['categoria'])->firstOrCreate([
                Category::NAME => $record['categoria'],
            ]);

            Document::insert([
                Document::CATEGORY_ID => $category->id,
                Document::TITLE => $record['titulo'],
                Document::CONTENTS => $record['conteúdo'],
                Document::CREATED_AT => now(),
                Document::UPDATED_AT => now(),
            ]);
        }
    }
}
