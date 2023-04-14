<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProveedorModel;
use App\Models\ProductoModel;
use App\Models\EntradaModel;
use App\Models\SalidaModel;
use App\Models\StockModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * @return void
     */
    public function run(): void
    {
        ProveedorModel::factory(100)->create();
        ProductoModel::factory(100)->create();
        EntradaModel::factory(100)->create();
        SalidaModel::factory(100)->create();
        StockModel::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
