<?php
use app\role;
use app\user;
use carbon\carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = factory::create();

        $adminRole = role::create(['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'System Administrator', 'allowed_rout' => 'admin' ]);
        $docterRole = role::create(['name' => 'docter', 'display_name' => 'Super', 'description' => 'System Super', 'allowed_rout' => 'admin' ]);
        $userRole = role::create(['name' => 'user', 'display_name' => 'user', 'description' => 'normal user', 'allowed_rout' => null ]);


        $admin = user::create([
            'frist_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@docter.tes',
            'email_verified' => carbon::now(),
            'mobile' => '8888888',
            'mobile_verified' => carbon::now(),
            'password' => bcrypt('123456'),
        ]);
        $admin->attachRole($adminRole);


        
        $docter = user::create([
            'frist_name' => 'docter',
            'last_name' => 'docter',
            'email' => 'admin@docter.tes',
            'email_verified' => carbon::now(),
            'mobile' => '7777777',
            'mobile_verified' => carbon::now(),
            'password' => bcrypt('12345'),
        ]);
        $admin->attachRole($docterRole);



        $user1 = user::create([
            'frist_name' => 'user1',
            'last_name' => 'user1',
            'email' => 'user1@docter.tes',
            'email_verified' => carbon::now(),
            'mobile' => '666666',
            'mobile_verified' => carbon::now(),
            'password' => bcrypt('1234'),
        ]);
        $user1->attachRole($userRole);


        $user2 = user::create([
            'frist_name' => 'user2',
            'last_name' => 'user2',
            'email' => 'user2@docter.tes',
            'email_verified' => carbon::now(),
            'mobile' => '66666',
            'mobile_verified' => carbon::now(),
            'password' => bcrypt('123'),
        ]);
        $user2->attachRole($userRole);

        $user3 = user::create([
            'frist_name' => 'user3',
            'last_name' => 'user3',
            'email' => 'user3@docter.tes',
            'email_verified' => carbon::now(),
            'mobile' => '66666',
            'mobile_verified' => carbon::now(),
            'password' => bcrypt('123'),
        ]);
        $user3->attachRole($userRole);
    
        for ($i = 0; $i <10; $i++ ){
            $user = user::create([
                'frist_name' => $faker->frist_name,
                'last_name' => $faker->last_name,
                'email' => $faker->email,
                'email_verified' => carbon::now(),
                'mobile' => '6666' . random_int(10000000, 99999999),
                'mobile_verified' => carbon::now(),
                'password' => bcrypt('123'),
            ]);
            $user->attachRole($userRole);

        }
    
    }
}
