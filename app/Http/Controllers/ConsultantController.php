<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MyEmail;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\Employment;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ConsultantController extends Controller
{
    //
    public function welcome(){
        //debug
        // if (Auth::check()) {
        //     dd('User is logged in', Auth::user());
        // } else {
        //     dd('User is not logged in');
        // }

        $consultants = Consultant::all();
        return view('welcome', compact('consultants'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'reimbursement' => 'required|numeric',
            'availability' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->title . '-' . $request->author . '-' . $file->getClientOriginalName();
        $file->move($filePath, $fileName);

        Consultant::create([
            'name' => $request->name,
            'email' => $request->email,
            'reimbursement' => $request->reimbursement,
            'availability' => $request->availability,
            'client_id' => $request->client_needs,
            'employment_id' => $request->employment_position,
            'skill_id' => $request->skill_industry,
            'image' => $fileName,
        ]);

        return redirect(route('welcome'));
    }

    public function addConsultant(){
        $clients = Client::all();
        $employments = Employment::all();
        $skills = Skill::all();
        return view('addConsultant', compact('clients', 'employments', 'skills'));
    }

    public function editConsultant($id){
        $consultant = Consultant::findOrFail($id);
        $clients = Client::all();
        $employments = Employment::all();
        $skills = Skill::all();
        return view('editConsultant', compact('consultant', 'clients', 'employments', 'skills'));
    }

    public function updateConsultant(Request $request, $id) {
        $consultant = Consultant::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'reimbursement' => 'required|numeric',
            'availability' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'reimbursement' => $request->reimbursement,
            'availability' => $request->availability,
            'employment_id' => $request->employment_position,
            'skill_id' => $request->skill_industry,
            'client_id' => $request->client_needs,
        ];

        if ($request->hasFile('image')) {
            $filePath = public_path('storage/images');
            $file = $request->file('image');
            $fileName = $request->name . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($filePath, $fileName);
            // Delete the old image if it exists
            if ($consultant->image && file_exists(public_path('storage/images/' . $consultant->image))) {
                unlink(public_path('storage/images/' . $consultant->image));
            }
            $data['image'] = $fileName;
        }

        $consultant->update($data);

        return redirect(route('welcome'));
    }

    public function deleteConsultant($id){
        Consultant::destroy($id);
        return redirect(route('welcome'));
    }
}
