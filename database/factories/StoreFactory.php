<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'region_id' => \App\Models\Region::factory(),
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->company,
            'description' => $this->faker->sentence(10),
            'address' => $this->faker->address,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'is_published' => $this->faker->boolean,
            'open_date' => $this->faker->optional()->date(),
            'logo_url' => $this->faker->optional()->imageUrl(200, 200, 'business'),
        ];
    }
}
