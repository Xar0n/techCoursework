<?php

namespace Database\Factories;

use App\Models\ConfigItem;
use App\Models\Grade;
use App\Models\Group;
use App\Models\InventoryNumber;
use App\Models\Organization;
use App\Models\Room;
use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'organization_id' => Organization::factory(),
            'inventory_number_id' => InventoryNumber::factory(),
            'room_id' => Room::factory(),
            'config_item_id' => ConfigItem::factory(),
            'view_id' => View::factory(),
            'grade_id' => Grade::factory(),
            'group_id' => Group::factory()
        ];
    }
}
