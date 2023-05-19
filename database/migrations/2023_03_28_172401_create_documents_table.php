<?php

use App\Models\Category;
use App\Models\Document;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Document::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(Document::CATEGORY_ID)->unsigned();
            $table->string(Document::TITLE, 60);
            $table->text(Document::CONTENTS);
            $table->boolean(Document::PROCESSED)->default(false);
            $table->timestamps();

            $table->foreign(Document::CATEGORY_ID)
                ->references(Category::ID)
                ->on(Category::TABLE_NAME)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Document::TABLE_NAME);
    }
};
