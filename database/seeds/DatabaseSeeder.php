<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        factory(App\Teacher::class, 25)->create();
        $this->call(KelasSeeder::class);
        factory(App\Student::class, 25)->create();
    }
}
