<?php

namespace Database\Factories;

use App\Models\Barcode;
use App\Models\Employee;
use App\Models\Equipment;
use App\Models\InventoryNumber;
use App\Models\ReasonWriteoff;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentNumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'used' => true,
            'equipment_id' => Equipment::factory(),
            'reason_writeoff_id' => ReasonWriteoff::factory(),
            'employee_id' => Employee::factory(),
            'barcode_id' => Barcode::factory(),
        ];
    }
}
