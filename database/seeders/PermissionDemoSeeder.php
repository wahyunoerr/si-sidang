<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    public function run()
    {
        // reset cached role dan permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // penguji
        Permission::create(['name' => 'ubah status sidang']);
        Permission::create(['name' => 'lihat jadwal sidang penguji']);
        Permission::create(['name' => 'lihat hasil sidang']);
        Permission::create(['name' => 'menambah catatan hasil sidang']);

        // pembimbing 1 dan 2
        Permission::create(['name' => 'lihat jadwal bimbingan']);
        Permission::create(['name' => 'tambah jadwal bimbingan']);
        Permission::create(['name' => 'ubah status bimbingan']);
        // mahasiswa
        Permission::create(['name' => 'lihat jadwal sidang']);
        Permission::create(['name' => 'ubah password']);
        Permission::create(['name' => 'pilih jenis sidang']);
        // kaprodi
        Permission::create(['name' => 'mengelola jadwal']);
        Permission::create(['name' => 'mengelola hak akses']);
        Permission::create(['name' => 'mengelola data pengguna']);



        // dosen
      $dosenRole =  Role::create(['name' => 'dosen']);
        $user = User::factory()->create([
            'name' => 'Dosen test',
            'username' => '12345678',
            'email' => 'dosen@umri.ac.id',
            'foto' => 'asdasd',
            'serial_user' => '123123',
            'no_telp' => '4363456',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($dosenRole);

        // kaprodi
       $kaprodiRole = Role::create(['name' => 'kaprodi']);
        $user = User::factory()->create([
            'name' => 'kaprodi test',
            'username' => '123456789',
            'email' => 'kaprodi@umri.ac.id',
            'foto' => 'asdasd',
            'serial_user' => '123123',
            'no_telp' => '4363456',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($kaprodiRole);

        // mahasiswa
       $mahasiswaRole = Role::create(['name' => 'mahasiswa']);
        $user = User::factory()->create([
            'name' => 'mahasiswa test',
            'username' => '12345678',
            'email' => 'mahasiswa@student.umri.ac.id',
            'foto' => 'asdasd',
            'serial_user' => '123123',
            'no_telp' => '4363456',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($mahasiswaRole);

        // admin
       $adminRole = Role::create(['name' => 'admin']);
        $user = User::factory()->create([
            'name' => 'admin test',
            'username' => 'admin',
            'foto' => 'asdasd',
            'serial_user' => '123123',
            'no_telp' => '4363456',
            'email' => 'admin@umri.ac.id',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($adminRole);
    }
}
