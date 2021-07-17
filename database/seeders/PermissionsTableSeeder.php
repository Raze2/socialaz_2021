<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'comment_create',
            ],
            [
                'id'    => 18,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 19,
                'title' => 'comment_show',
            ],
            [
                'id'    => 20,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 21,
                'title' => 'comment_access',
            ],
            [
                'id'    => 22,
                'title' => 'post_create',
            ],
            [
                'id'    => 23,
                'title' => 'post_edit',
            ],
            [
                'id'    => 24,
                'title' => 'post_show',
            ],
            [
                'id'    => 25,
                'title' => 'post_delete',
            ],
            [
                'id'    => 26,
                'title' => 'post_access',
            ],
            [
                'id'    => 27,
                'title' => 'like_show',
            ],
            [
                'id'    => 28,
                'title' => 'like_delete',
            ],
            [
                'id'    => 29,
                'title' => 'like_access',
            ],
            [
                'id'    => 30,
                'title' => 'user_friend_edit',
            ],
            [
                'id'    => 31,
                'title' => 'user_friend_show',
            ],
            [
                'id'    => 32,
                'title' => 'user_friend_delete',
            ],
            [
                'id'    => 33,
                'title' => 'user_friend_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
