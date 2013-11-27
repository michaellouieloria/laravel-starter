<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        $data = [
            [
                'name' => 'admin'
            ]
        ];

        foreach ($data as $datum)
        {
            $count = Role::where('name', $datum['name'])->count();
            if (!$count)
            {
                $adminRole = new Role;
                $adminRole->name = $datum['name'];
                $adminRole->save();

                $user = User::where('username','=','admin')->first();
                $user->attachRole( $adminRole );
            }
        }
    }

}
