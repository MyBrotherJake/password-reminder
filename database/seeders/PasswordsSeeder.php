<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Password;

class PasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        DB::table('m_pass')->insert([
            'site' => Str::random(10),
            'maddr' => Str::random(10).'@gmail.com',
            'account' => Str::random(20),
            'pass' => bcrypt('secret'),
            'bikou' => Str::random(50),
        ]);
        */
        Password::factory()->count(10)->create();
    }
}
