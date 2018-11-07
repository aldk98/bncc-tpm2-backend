<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'teacher_id' => 1,
            'name' => 'XA',
            'description' => 'This is Class XA'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 2,
            'name' => 'XB',
            'description' => 'This is Class XB'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 3,
            'name' => 'XC',
            'description' => 'This is Class XC'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 4,
            'name' => 'XIA',
            'description' => 'This is Class XIA'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 5,
            'name' => 'XIB',
            'description' => 'This is Class XIB'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 6,
            'name' => 'XIC',
            'description' => 'This is Class XIC'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 7,
            'name' => 'XIIA',
            'description' => 'This is Class XIIA'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 8,
            'name' => 'XIIB',
            'description' => 'This is Class XIIB'
        ]);
        DB::table('kelas')->insert([
            'teacher_id' => 9,
            'name' => 'XIIC',
            'description' => 'This is Class XIIC'
        ]);
    }
}
