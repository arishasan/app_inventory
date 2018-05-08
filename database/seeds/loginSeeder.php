<?php

use Illuminate\Database\Seeder;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->user_id = 'US001';
        $user->user_nama = 'superuser';
        $user->user_pass = bcrypt('super');
        $user->user_hak = 'su';
        $user->user_sts = '1';
        $user->save();

        $user = new \App\User;
        $user->user_id = 'US002';
        $user->user_nama = 'user';
        $user->user_pass = bcrypt('user');
        $user->user_hak = 'us';
        $user->user_sts = '1';
        $user->save();

        $user = new \App\User;
        $user->user_id = 'US003';
        $user->user_nama = 'admin';
        $user->user_pass = bcrypt('admin');
        $user->user_hak = 'ad';
        $user->user_sts = '1';
        $user->save();
    }
}
