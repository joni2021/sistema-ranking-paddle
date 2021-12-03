<?php

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name' => "Admin",
            'last_name' => "Istrator",
            'username' => "admin",
            'phone' => null,
            'email' => "admin@root.com",
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make("ranking1234"), // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        Factory(\App\User::class, 49)->create();
    }
}
