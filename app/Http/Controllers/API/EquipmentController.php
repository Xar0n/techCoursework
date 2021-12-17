<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    public function showAll(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'filters' => [
                'using' => [
                    'organization' => 'nullable|integer|between:1,20',
                    'employee' => 'nullable|integer|between:1,20',
                ],
                'location' => [
                    'address' => 'nullable|integer|between:1,20',
                    'room' => 'nullable|integer|between:1,20',
                ],
                'fields' => [
                    'inventory_number' => 'nullable|boolean',
                    'name' => 'nullable|boolean',
                    'barcode' => 'nullable|boolean',
                    'view' => 'nullable|boolean',
                    'grade' => 'nullable|boolean',
                    'group' => 'nullable|boolean',
                    'created_at' => 'nullable|boolean',
                    'updated_at' => 'nullable|boolean',
                ],
                'equipment' => [
                    'view' => 'nullable|integer|between:1,20',
                    'grade' => 'nullable|integer|between:1,20',
                    'group' => 'nullable|integer|between:1,20',
                ]
            ]
        ]);
        if($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $user = Auth::user();
            $organizations = $user->employee->organizations;
            $equipments = [];
            foreach ($organizations as $organization)
            {
                $equipments[] = Equipment::with(['equipmentNum', 'view', 'grade', 'group', 'configItem', 'inventoryNumber'])
                    ->where('organization_id', $organization->id)->get();
            }
            return response()->json([
                'status' => 200,
                'user_id' => $organizations,
                'equipments' => $equipments,
                'message' => 'Данные оборудования успешно получены'
            ]);
        }
    }

    public function add()
    {

    }
}
