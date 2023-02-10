<?php

namespace Database\Factories\laundry_shop;

use App\Models\laundry_shop\MstUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MstUserFactory extends Factory
{
    protected $model = MstUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'     => $this->faker->userName(),
            'password'     => '$2y$10$5aoPQTtdO/SvF/7WUCyYFe37G6kwR0HL0RgXp4LujuMw0UCjBpzvy', // 1
            'first_name'   => $this->faker->firstNameMale(),
            'last_name'    => $this->faker->lastName(),
            'email'        => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'address'      => $this->faker->unique()->address(),
            'created_user' => 'laundry-shop-api',
            'updated_user' => 'laundry-shop-api',
        ];
    }
}
