<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            ['table_number' => 'Meja 01', 'capacity' => 2, 'status' => 'available'],
            ['table_number' => 'Meja 02', 'capacity' => 2, 'status' => 'available'],
            ['table_number' => 'Meja 03', 'capacity' => 4, 'status' => 'available'],
            ['table_number' => 'Meja 04', 'capacity' => 4, 'status' => 'available'],
            ['table_number' => 'Meja 05', 'capacity' => 4, 'status' => 'available'],
            ['table_number' => 'Meja 06', 'capacity' => 6, 'status' => 'available'],
            ['table_number' => 'Meja 07', 'capacity' => 6, 'status' => 'available'],
            ['table_number' => 'Meja 08', 'capacity' => 8, 'status' => 'available'],
            ['table_number' => 'Meja 09', 'capacity' => 8, 'status' => 'available'],
            ['table_number' => 'Meja 10', 'capacity' => 10, 'status' => 'available'],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
