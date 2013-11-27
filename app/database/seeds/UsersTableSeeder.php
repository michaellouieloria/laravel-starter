<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@example.org',
                'password' => Hash::make('admin'),
                'confirmed' => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];

        foreach ($data as $datum)
        {
            $count = User::where('username', $datum['username'])->count();
            if (!$count)
            {
                //User::create($datum); is not working
                DB::table('users')->insert($datum);
            }
        }
    }

}