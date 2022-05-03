<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'  => 'topalek',
            'email' => 'admin@example.com',
        ]);
        Listing::factory(10)->create(['user_id' => $user->id]);
    }
}
