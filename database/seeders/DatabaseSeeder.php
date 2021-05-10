<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Contact;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $user = User::factory()
            ->count(10)
            ->has(Contact::factory()->count(20), 'contacts')
            ->create();
        
    }
}
