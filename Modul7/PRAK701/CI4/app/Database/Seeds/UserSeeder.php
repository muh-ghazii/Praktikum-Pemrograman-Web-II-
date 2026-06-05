<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder ini membuat 1 akun default untuk login.
 * Jalankan: php spark db:seed UserSeeder
 *
 * Username : admin
 * Password : admin123
 */
class UserSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            'username'   => 'admin',
            'email'      => 'admin@prak701.com',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('user')->insert($data);
    }
}