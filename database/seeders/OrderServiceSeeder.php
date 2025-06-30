<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\OrderService;
use App\Models\StockItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicians = User::get();
        $clients = Client::all();
        $stockItems = StockItem::all();

        if ($technicians->isEmpty() || $clients->isEmpty() || $stockItems->isEmpty()) {
            $this->command->error("Faltam técnicos, clientes ou peças no banco para criar ordens.");
            return;
        }

        $statuses = ['pending', 'in_progress', 'approved', 'rejected', 'cancelled', 'completed'];

        for ($i = 1; $i <= 30; $i++) {
            $order = OrderService::create([
                'client_id' => $clients->random()->id,
                'user_id' => $technicians->random()->id,
                'description' => "Ordem de serviço #{$i} - descrição gerada automaticamente.",
                'status' => $statuses[array_rand($statuses)],
            ]);

            $pieces = $stockItems->random(rand(1, 3));
            foreach ($pieces as $piece) {
                $order->stockItems()->attach($piece->id, ['quantity' => rand(1, 5)]);
            }
        }
    }
}
