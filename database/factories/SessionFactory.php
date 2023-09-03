<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Session;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SessionFactory extends Factory
{

    protected $model = Session::class;

    public function definition()
    {
        $start = Carbon::parse(fake()->dateTimeThisMonth); // Generate a random start date and time

        // Calculate end time with a random duration between 1 and 2 hours (3600 seconds to 7200 seconds)
        $duration = fake()->numberBetween(3600, 7200);
        $end = clone $start;
        $end->addSeconds($duration);
        $tenantId = Tenant::query()->inRandomOrder()->first()->id;

        return [
            'location_id' => function () use ($tenantId){
                // You can replace this with logic to get a valid location ID.
                return Location::query()->where('tenant_id','=', $tenantId )->inRandomOrder()->first()->id;
            },
            'tenant_id' => $tenantId,
            'type' => fake()->numberBetween(0, 1), // Modify the range as needed.
            'notes' => fake()->text,
            'start' => $start,
            'end' => $end,
        ];
    }
}
