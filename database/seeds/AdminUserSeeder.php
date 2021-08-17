<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create object of admin user model
        $admin = new AdminUser;

        $admin->name = 'Md. Moniruzzaman';
        $admin->email = 'moon199715@gmail.com';
        $admin->password_hash = Hash::make('artcam2021');
        // $admin->last_log_time = Carbon::now('Asia/Dhaka');
        $admin->save();
    }
}
