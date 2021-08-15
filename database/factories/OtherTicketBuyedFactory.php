<?php

namespace Database\Factories;

use App\Models\OtherTicketBuyed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OtherTicketBuyedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtherTicketBuyed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lottery_id' => 1,
            'ticket_buyed_id' => 1,
            'ticket' => 11
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
