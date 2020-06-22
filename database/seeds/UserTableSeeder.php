<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'fullname' => 'Abdullah zahid',
            'username' => 'joy2362',
            'email' => '2016100000046@seu.edu.bd',
            'email_verified_at'=>'2020-02-27 13:46:39',
            'gender'=>'male',
            'password' => '$2y$10$mP7bAW78pq02UAr.4Yv4COwlLe4dU0/voIvgn9KUbS7Wo1KCEhpIa',
            'image'=>'profile/battlefield-4-7680x4320-recon-sniper-8k-1534.jpg',
            'maxCapacity'=>'500',
            'fileSize'=>'0000',
            'remember_token'=>'ddH7sNLI7GknNa7GG6OypkkkAk1OkTRG91fOyPBjnsvyUOgJ2T1Tq0ZbHY79',

        ]);
    }
}
