<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        $user_id = User::all()->random()->id;
        return [
            'user_id' => $user_id,
            'contact_id' => Contact::query()->where("user_id", "=", $user_id)->get()->random(),
            'type_id' => rand(1,3),
            'name' => $this->faker->words(3, true),
            'text' => $this->faker->text(),
        ];
    }
}
