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
                'title' => 'workday_create',
            ],
            [
                'id'    => 18,
                'title' => 'workday_edit',
            ],
            [
                'id'    => 19,
                'title' => 'workday_show',
            ],
            [
                'id'    => 20,
                'title' => 'workday_delete',
            ],
            [
                'id'    => 21,
                'title' => 'workday_access',
            ],
            [
                'id'    => 22,
                'title' => 'shedule_create',
            ],
            [
                'id'    => 23,
                'title' => 'shedule_edit',
            ],
            [
                'id'    => 24,
                'title' => 'shedule_show',
            ],
            [
                'id'    => 25,
                'title' => 'shedule_delete',
            ],
            [
                'id'    => 26,
                'title' => 'shedule_access',
            ],
            [
                'id'    => 27,
                'title' => 'medicposition_create',
            ],
            [
                'id'    => 28,
                'title' => 'medicposition_edit',
            ],
            [
                'id'    => 29,
                'title' => 'medicposition_show',
            ],
            [
                'id'    => 30,
                'title' => 'medicposition_delete',
            ],
            [
                'id'    => 31,
                'title' => 'medicposition_access',
            ],
            [
                'id'    => 32,
                'title' => 'paramedic_create',
            ],
            [
                'id'    => 33,
                'title' => 'paramedic_edit',
            ],
            [
                'id'    => 34,
                'title' => 'paramedic_show',
            ],
            [
                'id'    => 35,
                'title' => 'paramedic_delete',
            ],
            [
                'id'    => 36,
                'title' => 'paramedic_access',
            ],
            [
                'id'    => 37,
                'title' => 'menuadmin_access',
            ],
            [
                'id'    => 38,
                'title' => 'menuregistrator_access',
            ],
            [
                'id'    => 39,
                'title' => 'menudoctor_access',
            ],
            [
                'id'    => 40,
                'title' => 'insurance_create',
            ],
            [
                'id'    => 41,
                'title' => 'insurance_edit',
            ],
            [
                'id'    => 42,
                'title' => 'insurance_show',
            ],
            [
                'id'    => 43,
                'title' => 'insurance_delete',
            ],
            [
                'id'    => 44,
                'title' => 'insurance_access',
            ],
            [
                'id'    => 45,
                'title' => 'mkb_create',
            ],
            [
                'id'    => 46,
                'title' => 'mkb_edit',
            ],
            [
                'id'    => 47,
                'title' => 'mkb_show',
            ],
            [
                'id'    => 48,
                'title' => 'mkb_delete',
            ],
            [
                'id'    => 49,
                'title' => 'mkb_access',
            ],
            [
                'id'    => 50,
                'title' => 'lpu_create',
            ],
            [
                'id'    => 51,
                'title' => 'lpu_edit',
            ],
            [
                'id'    => 52,
                'title' => 'lpu_show',
            ],
            [
                'id'    => 53,
                'title' => 'lpu_delete',
            ],
            [
                'id'    => 54,
                'title' => 'lpu_access',
            ],
            [
                'id'    => 55,
                'title' => 'contragent_create',
            ],
            [
                'id'    => 56,
                'title' => 'contragent_edit',
            ],
            [
                'id'    => 57,
                'title' => 'contragent_show',
            ],
            [
                'id'    => 58,
                'title' => 'contragent_delete',
            ],
            [
                'id'    => 59,
                'title' => 'contragent_access',
            ],
            [
                'id'    => 60,
                'title' => 'doctorvisit_create',
            ],
            [
                'id'    => 61,
                'title' => 'doctorvisit_edit',
            ],
            [
                'id'    => 62,
                'title' => 'doctorvisit_show',
            ],
            [
                'id'    => 63,
                'title' => 'doctorvisit_delete',
            ],
            [
                'id'    => 64,
                'title' => 'doctorvisit_access',
            ],
            [
                'id'    => 65,
                'title' => 'registration_new_visit_create',
            ],
            [
                'id'    => 66,
                'title' => 'registration_new_visit_edit',
            ],
            [
                'id'    => 67,
                'title' => 'registration_new_visit_show',
            ],
            [
                'id'    => 68,
                'title' => 'registration_new_visit_delete',
            ],
            [
                'id'    => 69,
                'title' => 'registration_new_visit_access',
            ],
            [
                'id'    => 70,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}