<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder {

    public function run() {

        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
           'nome' => 'Matheus Gomes',
           'email' => 'admin@admin.com',
           'telefone' => '64 - 1111-1111',
           'cpf' => '580.676.930-56',
        ];

        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
          'nome' => 'Fulano de tal',
          'email' => 'fulando@gmail.com',
          'telefone' => '41 - 8888-9999',
          'cpf' => '418.559.320-16',
        ];

        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}