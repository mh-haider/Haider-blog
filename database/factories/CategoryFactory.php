<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                'label' => 'Sport',
                'created_at' => now()
            ],[
                'label' => 'Tech',
                'created_at' => now()
            ],[
                'label' => 'Culture',
                'created_at' => now()
            ],[
                'label' => 'Business',
                'created_at' => now()
            ],[
                'label' => 'Science',
                'created_at' => now()
            ],[
                'label' => 'Style',
                'created_at' => now()
            ],
        ];
    }
}
