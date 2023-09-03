<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tenantId = Tenant::query()->inRandomOrder()->first()->id;

        return [
            'tenant_id' => $tenantId,
            'name' => fake()->city,
            'address' => fake()->streetAddress,
            'address2' => fake()->secondaryAddress,
            'zip' => fake()->postcode,
            'city' => fake()->city,
            'notes' => fake()->text,
        ];
    }
}
