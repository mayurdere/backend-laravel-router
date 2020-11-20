<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Router;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 10)->create();
        factory(Router::class, 10)->create();
    }
}
