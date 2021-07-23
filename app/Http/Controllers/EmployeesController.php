<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ApplyJobs;
use App\Models\Employees;
use App\Notifications\RejectEmployees;
use App\Notifications\AcceptEmployees;
use Storage;

class EmployeesController extends Controller
{
    public function apply_jobs(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['required', 'string', 'max:255'],
            'motto' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->messages());
            //return response()->json(['status'=>$validator->messages()], 422);
        }

        $files = $request->file('picture');
        $random = rand();
        $files_name = $random . "x" . $request->name . "." . $files->getClientOriginalExtension();
        Storage::putFileAs('public/Employees', $files, $files_name); 

        ApplyJobs::create([
            'applyer_id' => $random,
            'applyer_name' => $request->name,
            'applyer_email' => $request->email,
            'applyer_password' => Hash::make($request->password),
            'applyer_phone' => $request->phone,
            'applyer_bio' => $request->motto,
            'applyer_address' => $request->address,
            'applyer_picture' => "http://localhost:8000/storage/Employees/".$files_name,
            'applyer_level' => $request->level,
            'applyer_status' => 'pending',
        ]);
            return response()->json(['status'=>'Successfully']);
    }

    public function employees() {
        $jobs = Employees::orderBy('created_at', 'ASC')->get();
        return view('/karyawan', ['jobs' => $jobs]);
    }

    public function add_employees() {
        $jobs = ApplyJobs::where('applyer_status', 'pending')->orderBy('created_at', 'ASC')->get();
        return view('/lamaran', ['jobs' => $jobs]);
    }
    public function accept_employees(Request $request) {
        $jobs = ApplyJobs::where('applyer_id', $request->id)->first();
        Employees::create([
            'id' => $jobs->applyer_id,
            'name' => $jobs->applyer_name,
            'email' => $jobs->applyer_email,
            'password' => $jobs->applyer_password,
            'phone' => $jobs->applyer_phone,
            'bio' => $jobs->applyer_bio,
            'address' => $jobs->applyer_address,
            'picture' => $jobs->applyer_picture,
            'level' => $jobs->applyer_level,
        ]);
        ApplyJobs::where('applyer_id', $request->id)->update([
            'applyer_status' => 'accepted',
        ]);
        Notification::route('mail', $jobs->applyer_email)->notify(new AcceptEmployees($jobs->applyer_name));
        return redirect('/add/employees')->with(['status' => $jobs->applyer_name .' Successfully Accepted']);
    }
    public function reject_employees(Request $request) {
        $jobs = ApplyJobs::where('applyer_id', $request->id)->first();
        ApplyJobs::where('applyer_id', $request->id)->update([
            'applyer_status' => 'rejected',
        ]);

        Notification::route('mail', $jobs->applyer_email)->notify(new RejectEmployees($jobs->applyer_name));
        return redirect('/add/employees')->with(['status' => $jobs->applyer_name .' Successfully Rejected']);
    }
}
