<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['name' => 'Lucas Silva', 'phone' => '5551999990001', 'cpf' => '12345178900', 'email' => 'lucas.silva@example.com'],
            ['name' => 'Mariana Costa', 'phone' => '5551999990002', 'cpf' => '12325678900', 'email' => 'mariana.costa@example.com'],
            ['name' => 'Pedro Oliveira', 'phone' => '5551999990003', 'cpf' => '12445678900', 'email' => 'pedro.oliveira@example.com'],
            ['name' => 'Ana Pereira', 'phone' => '5551999990004', 'cpf' => '12345978900', 'email' => 'ana.pereira@example.com'],
            ['name' => 'João Santos', 'phone' => '5551999990005', 'cpf' => '12315678900', 'email' => 'joao.santos@example.com'],
            ['name' => 'Carla Almeida', 'phone' => '5551999990006', 'cpf' => '15345678900', 'email' => 'carla.almeida@example.com'],
            ['name' => 'Bruno Martins', 'phone' => '5551999990007', 'cpf' => '18345678900', 'email' => 'bruno.martins@example.com'],
            ['name' => 'Fernanda Lima', 'phone' => '5551999990008', 'cpf' => '12345678900', 'email' => 'fernanda.lima@example.com'],
            ['name' => 'Rafael Souza', 'phone' => '5551999990009', 'cpf' => '12340678900', 'email' => 'rafael.souza@example.com'],
            ['name' => 'Patrícia Barbosa', 'phone' => '5551999990010', 'cpf' => '92345678900', 'email' => 'patricia.barbosa@example.com'],
            ['name' => 'Gabriel Ferreira', 'phone' => '5551999990011', 'cpf' => '72345678900', 'email' => 'gabriel.ferreira@example.com'],
            ['name' => 'Julia Ribeiro', 'phone' => '5551999990012', 'cpf' => '32345678900', 'email' => 'julia.ribeiro@example.com'],
            ['name' => 'Matheus Gomes', 'phone' => '5551999990013', 'cpf' => '62345678900', 'email' => 'matheus.gomes@example.com'],
            ['name' => 'Bianca Rodrigues', 'phone' => '5551999990014', 'cpf' => '12375678900', 'email' => 'bianca.rodrigues@example.com'],
            ['name' => 'Diego Costa', 'phone' => '5551999990015', 'cpf' => '12345671900', 'email' => 'diego.costa@example.com'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
