<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){

        if(Auth::id()){
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }

        }
        else{
            return redirect('login');
        }

    }

    public function upload_doctor(Request $request){

        $doctor = new doctor;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment(){

       if(Auth::user()->usertype==1)
            {
                if(Auth::id()){

                $data=appointment::all();
                return view('admin.showappointment',compact('data'));
            }

            else{
                return redirect()->back();

            }
        }
            else{
                return redirect('login');
            }
        }


    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back()->with('message','Appointment Approved Successfully');

    }

    public function canceled($id){
        $data=appointment::find($id);
        $data->status='Canceled';

        $data->save();
        return redirect()->back()->with('message','Appointment Canceled Successfully');


   }

   public function showadoctor(){

    if(Auth::user()->usertype==1)
     {
        if(Auth::id()){
        $data = doctor::all();
        return view('admin.showadoctor', compact('data'));
     }else{
        return redirect()->back();

    }
}
    else{
        return redirect('login');
    }
}

   public function deletedoctor($id){

        $data=doctor::find($id);
        $data->delete();

        return redirect()->back()->with('message','Doctor Deleted Successfully');


   }

   public function updatedoctor($id){

    if(Auth::user()->usertype==1)
    {
       if(Auth::id()){
    $data = doctor::find($id);
    return view('admin.editdoctor', compact('data'));
   }
   else{
    return redirect()->back();

    }
    }
    else{
        return redirect('login');
    }
    }


   public function editdoctor(Request $request, $id){
        $data=doctor::find($id);


        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->room=$request->room;
        $data->speciality=$request->speciality;


        $image=$request->file;
        if($image){

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $data->image=$imagename;
        }

        $data->save();

        return redirect()->back()->with('message','Doctor Details Edited Successfully');
       }

       public function emailview($id){

            $data=appointment::find($id);
            return view('admin.email_view', compact('data'));
       }

       public function sendemail(Request $request, $id){
            $data = appointment::find($id);

            $details=[
                'greeting' => $request->greeting,
                'body' => $request->body,
                'actiontext' => $request->actiontext,
                'actionurl' => $request->actionurl,
                'endpart' => $request->endpart
            ];

            Notification::send($data,new SendEmailNotification($details));

            return redirect()->back()->with('message','Email Sent Successfully');


       }
    }
