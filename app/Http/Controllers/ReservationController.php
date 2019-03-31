<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
 public function reserve(Request $request)
 {

     $this->validate($request ,[
         'name' => 'required',
         'phone' => 'required',
         'email' => 'required|email',
         'dateandtime' => 'required',
         'messege' => 'required'

     ]);

     $reservation = new Reservation();

     $reservation->name =$request->name;
     $reservation->email =$request->email;
     $reservation->phone =$request->phone;
     $reservation->messege =$request->messege ;
     $reservation->date_and_time =$request->dateandtime;
     $reservation->status =false;
     $reservation->save();

     Toastr::success('Reservation Invitattion sent Successfully and We will confirm Shortly',
         'Success',["positionClass" => "toast-top-right"]);

     return redirect()->back();

 }
}
