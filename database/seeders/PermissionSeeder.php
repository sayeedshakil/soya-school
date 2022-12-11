<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'name' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'name' => 'permission_create',
            ],
            [
                'id'    => '3',
                'name' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'name' => 'permission_show',
            ],
            [
                'id'    => '5',
                'name' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'name' => 'permission_access',
            ],
            [
                'id'    => '7',
                'name' => 'role_create',
            ],
            [
                'id'    => '8',
                'name' => 'role_edit',
            ],
            [
                'id'    => '9',
                'name' => 'role_show',
            ],
            [
                'id'    => '10',
                'name' => 'role_delete',
            ],
            [
                'id'    => '11',
                'name' => 'role_access',
            ],
            [
                'id'    => '12',
                'name' => 'user_create',
            ],
            [
                'id'    => '13',
                'name' => 'user_edit',
            ],
            [
                'id'    => '14',
                'name' => 'user_show',
            ],
            [
                'id'    => '15',
                'name' => 'user_delete',
            ],
            [
                'id'    => '16',
                'name' => 'user_access',
            ],

            [
                'id'    => '17',
                'name' => 'notice_create',
            ],
            [
                'id'    => '18',
                'name' => 'notice_edit',
            ],
            [
                'id'    => '19',
                'name' => 'notice_show',
            ],
            [
                'id'    => '20',
                'name' => 'notice_delete',
            ],
            [
                'id'    => '21',
                'name' => 'notice_access',
            ],

            [
                'id'    => '22',
                'name' => 'student_create',
            ],
            [
                'id'    => '23',
                'name' => 'student_edit',
            ],
            [
                'id'    => '24',
                'name' => 'student_show',
            ],
            [
                'id'    => '25',
                'name' => 'student_delete',
            ],
            [
                'id'    => '26',
                'name' => 'student_access',
            ],

            [
                'id'    => '27',
                'name' => 'teacher_create',
            ],
            [
                'id'    => '28',
                'name' => 'teacher_edit',
            ],
            [
                'id'    => '29',
                'name' => 'teacher_show',
            ],
            [
                'id'    => '30',
                'name' => 'teacher_delete',
            ],
            [
                'id'    => '31',
                'name' => 'teacher_access',
            ],

            [
                'id'    => '32',
                'name' => 'class_create',
            ],
            [
                'id'    => '33',
                'name' => 'class_edit',
            ],
            [
                'id'    => '34',
                'name' => 'class_show',
            ],
            [
                'id'    => '35',
                'name' => 'class_delete',
            ],
            [
                'id'    => '36',
                'name' => 'class_access',
            ],

            [
                'id'    => '37',
                'name' => 'site_configuration_create',
            ],
            [
                'id'    => '38',
                'name' => 'site_configuration_edit',
            ],
            [
                'id'    => '39',
                'name' => 'site_configuration_show',
            ],
            [
                'id'    => '40',
                'name' => 'site_configuration_delete',
            ],
            [
                'id'    => '41',
                'name' => 'site_configuration_access',
            ],

            [
                'id'    => '42',
                'title' => 'expense_management_access',
            ],
            [
                'id'    => '43',
                'title' => 'expense_category_create',
            ],
            [
                'id'    => '44',
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => '45',
                'title' => 'expense_category_show',
            ],
            [
                'id'    => '46',
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => '47',
                'title' => 'expense_category_access',
            ],
            [
                'id'    => '48',
                'title' => 'income_category_create',
            ],
            [
                'id'    => '49',
                'title' => 'income_category_edit',
            ],
            [
                'id'    => '50',
                'title' => 'income_category_show',
            ],
            [
                'id'    => '51',
                'title' => 'income_category_delete',
            ],
            [
                'id'    => '52',
                'title' => 'income_category_access',
            ],
            [
                'id'    => '53',
                'title' => 'expense_create',
            ],
            [
                'id'    => '54',
                'title' => 'expense_edit',
            ],
            [
                'id'    => '55',
                'title' => 'expense_show',
            ],
            [
                'id'    => '56',
                'title' => 'expense_delete',
            ],
            [
                'id'    => '57',
                'title' => 'expense_access',
            ],
            [
                'id'    => '58',
                'title' => 'income_create',
            ],
            [
                'id'    => '59',
                'title' => 'income_edit',
            ],
            [
                'id'    => '60',
                'title' => 'income_show',
            ],
            [
                'id'    => '61',
                'title' => 'income_delete',
            ],
            [
                'id'    => '62',
                'title' => 'income_access',
            ],
            [
                'id'    => '63',
                'title' => 'expense_report_create',
            ],
            [
                'id'    => '64',
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => '65',
                'title' => 'expense_report_show',
            ],
            [
                'id'    => '66',
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => '67',
                'title' => 'expense_report_access',
            ],
            // [
            //     'id'    => '17',
            //     'name' => 'database_notification_access',
            // ],
            // [
            //     'id'    => '27',
            //     'name' => 'change_password_access',
            // ],
            // [
            //     'id'    => '18',
            //     'name' => 'profile_access',
            // ],
            // [
            //     'id'    => '19',
            //     'name' => 'profile_create',
            // ],
            // [
            //     'id'    => '20',
            //     'name' => 'profile_edit',
            // ],
            // [
            //     'id'    => '21',
            //     'name' => 'profile_delete',
            // ],


        ];

        Permission::insert($permissions);
    }
}
