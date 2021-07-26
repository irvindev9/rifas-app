<?php

namespace Database\Factories;

use App\Models\TicketBuyed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketBuyedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketBuyed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lottery_id' => 1,
            'ticket' => 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
    
    }
}
