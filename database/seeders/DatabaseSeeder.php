<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Equipment;
use App\Models\EquipmentNum;
use App\Models\Organization;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Equipment::factory()->has(EquipmentNum::factory()->count(20))->count(20)->create();
    }
}
