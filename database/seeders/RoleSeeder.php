<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Model::unguard();

        // $this->call("OthersTableSeeder");

        $superadmin = Role::create(['name' => 'Super Admin']);
        $user = Role::create(['name' => 'User']);
        $perwakilan = Role::create(['name' => 'Perwakilan Unit Kerja']);
        $biro_hukum = Role::create(['name' => 'Biro Hukum']);
        $karo_hkh = Role::create(['name' => 'Karo HKH']);
        $sekjen = Role::create(['name' => 'Sekretaris Jenderal']);
        $pimpinan = Role::create(['name' => 'Pimpinan']);

        $superadmin->givePermissionTo(Permission::all());
        $user->givePermissionTo(['dashboard-access', 'profile-access']);
        $perwakilan->givePermissionTo(['dashboard-access', 'regulation-access', 'regulation-create', 'regulation-update', 'regulation-destroy']);
        $biro_hukum->givePermissionTo(['dashboard-access', 'regulation-access', 'regulation-status-update-penyusunan_pembahasan', 'regulation-status-update-penyelarasan', 'regulation-status-update-penetapan', 'regulation-status-update-pengundangan_peraturan', 'regulation-status-update-penyusunan_informasi', 'regulation-status-update-penyebarluasan', 'regulation-status-update-laporan_proses', 'regulation-status-update-analisa_evaluasi']);
        $karo_hkh->givePermissionTo(['dashboard-access', 'regulation-access', 'regulation-status-update-persetujuan_pimpinan']);
        $sekjen->givePermissionTo(['dashboard-access', 'regulation-access', 'regulation-status-update-persetujuan_pimpinan']);
        $pimpinan->givePermissionTo(['dashboard-access', 'regulation-access', 'regulation-status-update-persetujuan_pimpinan']);

        User::firstWhere('email', 'superadmin@example.com')->assignRole('Super Admin');
        User::firstWhere('email', 'user@example.com')->assignRole('User');
        User::firstWhere('email', 'hukum@example.com')->assignRole('Biro Hukum');
        User::firstWhere('email', 'perwakilan@example.com')->assignRole('Perwakilan Unit Kerja');
        User::firstWhere('email', 'karohkh@example.com')->assignRole('Karo HKH');
        User::firstWhere('email', 'sekretarisjendral@example.com')->assignRole('Sekretaris Jenderal');
        User::firstWhere('email', 'pimpinan@example.com')->assignRole('Pimpinan');
    }
}
