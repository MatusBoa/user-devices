<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Container\User\Database\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Container\User\Database\Model\User>
 */
class UserFactory extends Factory
{
    /**
     * @inheritDoc
     */
    protected $model = User::class;

    /**
     * @inheritDoc
     *
     * @return array<\App\Container\User\Model\User::ATTR_*, mixed>
     */
    public function definition(): array
    {
        return [
            User::ATTR_FIRSTNAME => $this->faker->firstName(),
            User::ATTR_LASTNAME => $this->faker->lastName(),
        ];
    }
}
