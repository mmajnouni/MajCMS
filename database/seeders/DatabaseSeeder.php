<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       //User::factory()->count(1)->has(Post::factory()->count(3))->create();
        //Post::factory()->count(2)->create();

       DB::table('users')->insert([
        'name' => 'morteza majnouni',
        'username' => 'm_maj7',
           'email' => 'mmajnouni@gmail.com',
           'password' => bcrypt(12345678)
       ]);



    }
}
