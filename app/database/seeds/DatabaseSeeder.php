<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        //Allow delete of tables with foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        //$this->call('CommentsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('PagesTableSeeder');
    }

}