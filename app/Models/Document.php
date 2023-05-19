<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Document extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const TABLE_NAME = 'documents';
    public const ID = 'id';
    public const TITLE = 'title';
    public const CONTENTS = 'contents';
    public const CATEGORY_ID = 'category_id';
    public const PROCESSED = 'processed';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::TITLE => 'string',
        self::CONTENTS => 'string',
        self::CATEGORY_ID => 'integer',
        self::PROCESSED => 'boolean',
    ];

    public static function count(): int
    {
        return Document::all()->count();
    }

    public static function create(array $array): Model|Builder
    {
        return Document::query()->create($array);
    }

    public static function insert(array $array): bool
    {
        return Document::query()->insert($array);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
