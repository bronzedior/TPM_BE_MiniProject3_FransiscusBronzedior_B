<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantApiController extends Controller
{
    //
    public function index(Request $request){
        $consultants = Consultant::all();
        return response()->json(['success'=>true,
        'consultant_data'=>$consultants],
        200);
    }

    public function save(Request $request){
        $consultant = New Consultant;
        try {
            $consultant->name = $request->name;
            $consultant->email = $request->email;
            $consultant->reimbursement = $request->reimbursement;
            $consultant->availability = $request->availability;
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>true, 'consultant_data'=>$consultant
        ]);
    }

    public function update($id, Request $request){
        $consultantToUpdate = Consultant::find($id);

        $consultantToUpdate->name = $request->name;
        $consultantToUpdate->email = $request->email;
        $consultantToUpdate->reimbursement = $request->reimbursement;
        $consultantToUpdate->availability = $request->availability;
        $consultantToUpdate->save();

        return response()->json(['success'=>true,
        'message'=>'Consultant data has updated successfully',
        'new_consultant_data'=> $consultantToUpdate], 200);
    }

    public function destroy($id){
        $consultant = Consultant::find($id);
        $consultant->delete();

        return response()->json(['success'=>true,
        'message'=>'Consultant deleted']);
    }
}
