<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // dashboard
        Permission::create(['name' => 'dashboard-access']);

        // User Management
        Permission::create(['name' => 'user-access']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-update']);
        Permission::create(['name' => 'user-destroy']);

        // User Profile
        Permission::create(['name' => 'profile-access']);

        // Role Management
        Permission::create(['name' => 'role-access']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-update']);
        Permission::create(['name' => 'role-destroy']);

        // Data Karyawan
        Permission::create(['name' => 'users-access']);
        Permission::create(['name' => 'users-create']);
        Permission::create(['name' => 'users-update']);
        Permission::create(['name' => 'users-destroy']);

        Permission::create(['name' => 'regulation-access']);
        Permission::create(['name' => 'regulation-create']);
        Permission::create(['name' => 'regulation-update']);
        Permission::create(['name' => 'regulation-destroy']);

        Permission::create(['name' => 'regulation-status-update-pengusulan']);
        Permission::create(['name' => 'regulation-status-update-penyusunan_pembahasan']);
        Permission::create(['name' => 'regulation-status-update-partisipasi_publik']);
        Permission::create(['name' => 'regulation-status-update-persetujuan_pimpinan']);
        Permission::create(['name' => 'regulation-status-update-penyelarasan']);
        Permission::create(['name' => 'regulation-status-update-penetapan']);
        Permission::create(['name' => 'regulation-status-update-pengundangan_peraturan']);
        Permission::create(['name' => 'regulation-status-update-penyusunan_informasi']);
        Permission::create(['name' => 'regulation-status-update-penyebarluasan']);
        Permission::create(['name' => 'regulation-status-update-laporan_proses']);
        Permission::create(['name' => 'regulation-status-update-analisa_evaluasi']);
    }
}
