<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Service;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use PDOException;

class FrontendController extends Controller
{
   public function store(Request $request){
      $data=$request->all();
      try {

        Appointment::create([
           'patients_name'=>$data['name'],
           'phone'=>$data['phone'],
           'email'=>$data['email'],
           'appointment_date'=>$data['date'],
           'doctor_id'=>$data['doctor'],
           'status'=>'pending',
           'message'=>$data['message']

        ]);
          
      } catch (PDOException $ex) {
          echo($ex);
      }

      return redirect()->route('homepage')->withMessage('Thanks for your appointments. Please wait for the conformation.We will notify you!');

   }

   public function index(){

    $doctors=User::where('role_id',3)->get();
    $departments=Department::all();
    $test_department=Test::all();
    return view('welcome',compact('doctors','departments','test_department'));
   }
   public function view(){
      $doctorslist=User::where('role_id',3)->paginate(4);
     
      return view('doctors',compact('doctorslist'));
   }

   public function find(){

      $departments=Department::all();
      return view('finddoctor',compact('departments'));
   }
   public function finddoc(Request $request){
      $departments=Department::all();
      $doctor=null;
      $doctor_name=$request->doctor_name;
      $speciality=$request->speciality;
      if(isset($speciality)){
          $doctor=User::where('role_id',3)->where('department_id',$speciality)->get();
      }
      if(isset($speciality)&& $speciality=='all'){
         $doctor=User::where('role_id',3)->get();
     }
      if(isset($doctor_name)){
         $doctor=User::where('role_id',3)->where('first_name','like',"%{$doctor_name}%")->orwhere('last_name','like',"%{$doctor_name}%")->get();
      }

   
      return view('finddoctor',compact('departments','doctor'));
   }

   public function pricelist(){

         $test_category=Test::all();
   
         $test_list=Service::paginate(15);
         return view('testlist',compact('test_list','test_category'));
     
   }

   public function filter(Request $request){

       $filter_by=$request->filter_by;
       $testlist=null;
       $test_category=Test::all();
        if(isset($filter_by)&&$filter_by!='all'){
         $testlist=Service::where('category_id',$filter_by)->paginate(15);
         
         return view('filter',compact('testlist','test_category'));
      
        }
        else{
         $test_list=Service::paginate(15);
         
         return redirect()->route('pricelist',compact('test_list','test_category'));
        }
    

      
   }

}
