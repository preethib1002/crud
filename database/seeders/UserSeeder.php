<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        for ($i=0; $i < 3; $i++) {
        User::create([
            'name' => Str::random(8),
	        'email' => Str::random(12).'@mail.com',
	        'password' => bcrypt('123456')
        ]);
    }
    }
}
?>
