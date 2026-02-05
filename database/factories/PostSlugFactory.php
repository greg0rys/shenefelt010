<?php

namespace Database\Factories;

use App\Models\PostSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostSlugFactory extends Factory
{
    protected $model = PostSlug::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
