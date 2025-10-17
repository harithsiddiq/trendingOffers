<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Convenience accessor: get value by key.
     */
    public static function get(string $key, $default = null): ?string
    {
        $value = static::query()->where('key', $key)->value('value');
        return $value ?? $default;
    }

    /**
     * Convenience mutator: set value by key.
     */
    public static function set(string $key, $value): void
    {
        static::query()->updateOrCreate(['key' => $key], ['value' => $value]);
    }
}