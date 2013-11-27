<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        $data = [
            [
                'name' => 'manage_blogs',
                'display_name' => 'manage blogs'
            ],
            [
                'name' => 'manage_posts',
                'display_name' => 'manage posts'
            ],
            [
                'name' => 'manage_comments',
                'display_name' => 'manage comments'
            ],
            [
                'name' => 'manage_users',
                'display_name' => 'manage users'
            ],
            [
                'name' => 'manage_roles',
                'display_name' => 'manage roles'
            ],
            [
                'name' => 'manage_pages',
                'display_name' => 'manage pages'
            ],
            [
                'name' => 'manage_pages',
                'display_name' => 'manage pages'
            ],
        ];

        $role = Role::where('name', 'admin')->first();

        foreach ($data as $datum)
        {
            $count = Permission::where('name', $datum['name'])->count();
            if (!$count)
            {
                $permission = Permission::create($datum);

                $count = DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->count();
                if (!$count)
                {
                    DB::table('permission_role')->insert(array('role_id' => $role->id, 'permission_id' => $permission->id));
                }
            }
        }
     }

}