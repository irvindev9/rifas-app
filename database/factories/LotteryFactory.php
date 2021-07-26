<?php

namespace Database\Factories;

use App\Models\Lottery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LotteryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lottery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Mi prueba de Rifa",
            'quantity_tickets' => 100,
            'price_ticket' => 1000,
            'lastday_lottery' => now(), 
            'active' => 1,
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
