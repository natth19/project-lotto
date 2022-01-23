<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class CreateMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'username' => 'Admin',
                'first_name' => 'admin@admin.com',
                'last_name' => 'Admin_Anon',
                'user_phone' => '0883224999',
                'user_address' => '100/91 ชั้น 27 ถนน พระราม 9 แขวง ห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310',
                'is_admin' => '1',
                'password' => bcrypt('123456')
            ],
            [
                'username' => 'member001',
                'first_name' => 'member001',
                'last_name' => 'normal',
                'user_phone' => '0812584544',
                'user_address' => '100/91 ชั้น 27 ถนน พระราม 9 แขวง ห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310',
                'is_admin' => '0',
                'password' => bcrypt('123456')
            ]
            ];

            foreach($user as $key => $value){
                Member::create($value);
            }
    }
}
