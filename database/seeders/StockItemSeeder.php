<?php

namespace Database\Seeders;

use App\Models\StockItem;
use Illuminate\Database\Seeder;

class StockItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['brand' => 'Samsung', 'model' => 'Galaxy S21', 'name' => 'Tela AMOLED Galaxy S21', 'type' => 'Tela', 'quantity' => 30, 'purchase_price' => 250.00, 'sale_price' => 350.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Apple', 'model' => 'iPhone 12', 'name' => 'Bateria iPhone 12 Original', 'type' => 'Bateria', 'quantity' => 25, 'purchase_price' => 120.00, 'sale_price' => 180.00, 'supplier' => 'Apple Parts Store'],
            ['brand' => 'Motorola', 'model' => 'Moto G9', 'name' => 'Carcaça Traseira Moto G9', 'type' => 'Carcaça', 'quantity' => 20, 'purchase_price' => 80.00, 'sale_price' => 130.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Samsung', 'model' => 'Galaxy S10', 'name' => 'Conector de Carga Galaxy S10', 'type' => 'Conector', 'quantity' => 40, 'purchase_price' => 35.00, 'sale_price' => 60.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Apple', 'model' => 'iPhone 11', 'name' => 'Câmera Traseira iPhone 11', 'type' => 'Câmera', 'quantity' => 15, 'purchase_price' => 300.00, 'sale_price' => 450.00, 'supplier' => 'Apple Parts Store'],
            ['brand' => 'Xiaomi', 'model' => 'Redmi Note 9', 'name' => 'Tela LCD Redmi Note 9', 'type' => 'Tela', 'quantity' => 22, 'purchase_price' => 200.00, 'sale_price' => 280.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Motorola', 'model' => 'Moto E7', 'name' => 'Alto-Falante Moto E7', 'type' => 'Alto-falante', 'quantity' => 35, 'purchase_price' => 25.00, 'sale_price' => 40.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Samsung', 'model' => 'Galaxy A52', 'name' => 'Bateria Galaxy A52', 'type' => 'Bateria', 'quantity' => 28, 'purchase_price' => 90.00, 'sale_price' => 140.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Apple', 'model' => 'iPhone SE', 'name' => 'Botão Home iPhone SE', 'type' => 'Botão', 'quantity' => 18, 'purchase_price' => 40.00, 'sale_price' => 70.00, 'supplier' => 'Apple Parts Store'],
            ['brand' => 'Samsung', 'model' => 'Galaxy Note 20', 'name' => 'S-Pen Galaxy Note 20', 'type' => 'Acessório', 'quantity' => 10, 'purchase_price' => 120.00, 'sale_price' => 180.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Xiaomi', 'model' => 'Mi 10', 'name' => 'Carregador Original Xiaomi', 'type' => 'Carregador', 'quantity' => 50, 'purchase_price' => 30.00, 'sale_price' => 50.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Motorola', 'model' => 'Moto G8', 'name' => 'Display Moto G8', 'type' => 'Tela', 'quantity' => 24, 'purchase_price' => 150.00, 'sale_price' => 210.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Samsung', 'model' => 'Galaxy S20', 'name' => 'Câmera Frontal Galaxy S20', 'type' => 'Câmera', 'quantity' => 14, 'purchase_price' => 220.00, 'sale_price' => 300.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Apple', 'model' => 'iPhone XR', 'name' => 'Conector Lightning iPhone XR', 'type' => 'Conector', 'quantity' => 20, 'purchase_price' => 55.00, 'sale_price' => 85.00, 'supplier' => 'Apple Parts Store'],
            ['brand' => 'Samsung', 'model' => 'Galaxy A12', 'name' => 'Carcaça Traseira Galaxy A12', 'type' => 'Carcaça', 'quantity' => 30, 'purchase_price' => 70.00, 'sale_price' => 110.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Xiaomi', 'model' => 'Redmi 9', 'name' => 'Bateria Redmi 9', 'type' => 'Bateria', 'quantity' => 26, 'purchase_price' => 80.00, 'sale_price' => 120.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Motorola', 'model' => 'Moto G7', 'name' => 'Microfone Moto G7', 'type' => 'Microfone', 'quantity' => 22, 'purchase_price' => 20.00, 'sale_price' => 35.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Samsung', 'model' => 'Galaxy S9', 'name' => 'Tela AMOLED Galaxy S9', 'type' => 'Tela', 'quantity' => 19, 'purchase_price' => 180.00, 'sale_price' => 270.00, 'supplier' => 'TecnoPeças Brasil'],
            ['brand' => 'Apple', 'model' => 'iPhone 13 Pro', 'name' => 'Tela OLED iPhone 13 Pro', 'type' => 'Tela', 'quantity' => 12, 'purchase_price' => 600.00, 'sale_price' => 850.00, 'supplier' => 'Apple Parts Store'],
            ['brand' => 'Xiaomi', 'model' => 'Mi Note 10', 'name' => 'Carregador Turbo Xiaomi', 'type' => 'Carregador', 'quantity' => 45, 'purchase_price' => 40.00, 'sale_price' => 65.00, 'supplier' => 'Peças & Cia'],
            ['brand' => 'Samsung', 'model' => 'Galaxy S8', 'name' => 'Switch Power Galaxy S8', 'type' => 'Switch', 'quantity' => 16, 'purchase_price' => 25.00, 'sale_price' => 45.00, 'supplier' => 'TecnoPeças Brasil'],
        ];

        foreach ($items as $item) {
            StockItem::create($item);
        }
    }
}
