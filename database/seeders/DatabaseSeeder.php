<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\InventoryItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\InventoryItemSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        InventoryItem::factory(10)->create();
        Company::factory(10)->create();
    }
}
