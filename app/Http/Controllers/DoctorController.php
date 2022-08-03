<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DoctorController extends Controller
{
    public function store(Request $request)
    {

        return $request;

        foreach ($request->day as $item => $value){
            foreach ($value as $item) {
                foreach ($item as $key => $val){
                    return $val;
                }
            }
        }
        exit();


        $data=$request->all();
        $path='public/products';
        $image=$request->file('image');
        $image_name=time().$image->getClientOriginalName();
        $request->file('image')->storeAs($path,$image_name);


        $data['role_id']=3;
        $data['image']=$image_name;



        try {
            User::create([
             'first_name'=>$data['fname'],
             'last_name'=>$data['lname'],
             'email'=>$data['email'],
             'password'=>$data['password'],
             'department_id'=>$data['department'],
             'role_id'=>$data['role_id'],

            ]);

            $user=User::latest()->first();
            $user_id=$user->id;
            $profileData=[];
            $profileData['user_id']=$user_id;
            $profileData['gender']=$data['gender'];
            $profileData['phone']=$data['phone'];
            $profileData['dob']=$data['dob'];
            $profileData['nid']=$data['nid'];
            $profileData['degree']=$data['degree'];
            $profileData['join_date']=$data['join_date'];
            $profileData['city']=$data['city'];
            $profileData['state']=$data['state'];
            $profileData['address']=$data['address'];
            $profileData['bio']=$data['bio'];
            $profileData['image']=$data['image'];

            Profile::create($profileData);



        } catch (Exception $ex) {
            dd($ex);
        }
        return redirect()->route('doctors.index')->withMessage('Successfully Saved');
    }

    public function index()
    {
         $role_id=3;
        $doctors=User::where('role_id',3)->get();
     return view('backend.admin.doctors.index',compact('doctors'));

    }
    public function show($id){

        $doctor=User::findOrFail($id);
        return view('backend.admin.doctors.show',compact('doctor'));
    }

    public function create(){
        $departments = Department::all();
        return view('backend.admin.doctors.create',compact('departments'));
    }
}
