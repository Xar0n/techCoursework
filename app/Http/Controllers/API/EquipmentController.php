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
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer|between:1,20'
        ]);
        if($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $org_id = [];
            $user = Auth::user();
            $organizations = $user->employee->organizations;
            foreach ($organizations as $organization) {
                $org_id[] = $organization->id;
            }
            $equipment = Equipment::with(['inventoryNumber', 'configItem', 'view', 'grade', 'group', 'equipmentNum',
                'equipmentNum.barcode', 'equipmentNum.employee', 'equipmentNum.reasonWriteoff'])
                ->where('id', $request->input('id'))->get()[0];
            if(!empty($equipment) && in_array($equipment->organization_id, $org_id))
            {
                return response()->json([
                    'status' => 200,
                    'equipment' => $equipment,
                    'message' => 'Данные одного оборудования успешно получены'
                ]);
           } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Ничего не найдено'
                ]);
            }
        }
    }

    public function update(Request $request)
    {

    }

    public function create(Request $request)
    {

    }

    public function showAll(Request $request)
    {
        $validator = Validator::make($request->all(),[
//            'filters' => [
//                'using' => [
//                    'organization' => 'nullable|integer|between:1,20',
//                    'employee' => 'nullable|integer|between:1,20',
//                ],
//                'location' => [
//                    'address' => 'nullable|integer|between:1,20',
//                    'room' => 'nullable|integer|between:1,20',
//                ],
//                'fields' => [
//                    'fields.inventory_number' => 'required|boolean',
//                    'fields.name' => 'required|boolean',
//                    'fields.barcode' => 'required|boolean',
//                    'fields.view' => 'required|boolean',
//                    'grade' => 'required|boolean',
//                    'group' => 'required|boolean',
//                    'created_at' => 'required|boolean',
//                    'updated_at' => 'required|boolean',
//                ],
//                'equipment' => [
//                    'view' => 'nullable|integer|between:1,20',
//                    'grade' => 'nullable|integer|between:1,20',
//                    'group' => 'nullable|integer|between:1,20',
//                ]
//            ]
        ]);
        if($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
//            $fields = (array) $request->input('fields');
//            $equipments_fields = [];
//            $equipments_num_fields = [];
//            if($fields['inventory_number']) $equipments_fields[] = 'inventoryNumber';
//            if($fields['name']) $equipments_fields[] = 'configItem';
//            if($fields['barcode']) $equipments_num_fields[] = 'barcode';
//            if($fields['view']) $equipments_fields[] = 'view';
//            if($fields['grade']) $equipments_fields[] = 'grade';
//            if($fields['group']) $equipments_fields[] = 'group';
//            if($fields['created_at']) $equipments_num_fields[] = 'created_at';
//            if($fields['updated_at']) $equipments_num_fields[] = 'updated_at';

            $user = Auth::user();
            $organizations = $user->employee->organizations;
            $equipments = [];
            foreach ($organizations as $organization)
            {
                $equipment = Equipment::with(['inventoryNumber', 'organization', 'configItem', 'view', 'grade', 'group', 'equipmentNum',
                    'equipmentNum.barcode', 'equipmentNum.employee', 'equipmentNum.reasonWriteoff'])
                    ->where('organization_id', $organization->id)->get();
                $equipments[] = $equipment;
            }
            return response()->json([
                'status' => 200,
                'equipments' => $equipments,
                'message' => 'Данные оборудования успешно получены'
            ]);
        }
    }
}
