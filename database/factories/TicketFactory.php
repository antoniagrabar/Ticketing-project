<?php

namespace Database\Factories;

use App\Models\;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{

    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'contact_id' => Contact::factory(),
            'type_id' => Type::factory(),
            'name' => $this->faker->name(),
            'text' => $this->faker->text(),
        ];
    }
}
