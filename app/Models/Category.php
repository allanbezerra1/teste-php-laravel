<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const TABLE_NAME = 'categories';
    public const ID = 'id';
    public const NAME = 'name';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public static function count(): int
    {
        return Category::all()->count();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
