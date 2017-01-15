<?php

use Illuminate\Database\Seeder;
use \Ultraware\Roles\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $roles = ['Super Admin', 'Admin', 'Lecturer', 'Student', 'User'];

        for($i = 0; $i < count($roles); $i++) {
            Role::create([
                'name' => $roles[$i],
                'slug' => str_slug($roles[$i])
            ]);
        }

    }
}
