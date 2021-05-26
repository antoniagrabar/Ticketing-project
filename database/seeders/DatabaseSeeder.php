<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\Type;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $user = User::factory()
            ->count(10)
            ->has(Contact::factory()->count(20), 'contacts')
            ->create(); 

        Type::query()->create([
            'id' => '1', 'name' => 'proposal'
        ]);
        Type::query()->create([
            'id' => '2', 'name' => 'complaint'
        ]);
        Type::query()->create([
            'id' => '3', 'name' => 'reclamation'
        ]);


        $ticket = Ticket::factory()
            ->count(200)
            ->create();
    }
}
