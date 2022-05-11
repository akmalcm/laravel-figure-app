<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'buyer_id' => $this->faker->numberBetween(2, 3),
            'figure_id' => $this->faker->numberBetween(1, 10),
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phone' => $this->faker->mobileNumber(false, false),
            'address' => $this->faker->buildingPrefix() . ' '
                . $this->faker->buildingNumber() . ', '
                . $this->faker->township() . ', '
                . $this->faker->streetName() . ' ',
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'status' => array('pending', 'completed')[$this->faker->numberBetween(0, 1)],
        ];
    }
}
