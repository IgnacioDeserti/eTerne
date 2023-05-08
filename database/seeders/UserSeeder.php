<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Ignacio Deserti',
                'email' => 'ignaciodeserti@gmail.com',
                'password' => bcrypt("Nacho2016")
            ])->assignRole('admin');
            
        User::create(
        [
            'name' => 'Ignacio Tosini',
            'email' => 'ignaciotosini2002@gmail.com',
            'password' => bcrypt("Nachiitox8")
        ])->assignRole('admin');
    }
}
