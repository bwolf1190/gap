<?php
namespace App\Http\Controllers;

use App\Mail\EnrollmentReminder;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use File;
use Mail;

class CommandController extends Controller
{    
      
      public static function sendP2CEnrollments(){
            $enrollments = \App\Models\EnrollmentP2C::get()->toArray();
            $confirmed_enrollments = [];

            /*$e = last($enrollments);
            $acc_num = $e['LDC_Account_Num'];
            $customer = \App\Models\Customer::where('acc_num', $acc_num)->first();
            dd($customer->enrollment->status);*/

            foreach($enrollments as $e){
                  $acc_num = $e['LDC_Account_Num'];
                  $customer = \App\Models\Customer::where('acc_num', $acc_num)->first();
                  $enrollment_p2c = \App\Models\EnrollmentP2C::where('id', $e['id'])->first();

                  if($e['status'] === 'CONFIRMED' && $e['status'] !== 'PROCESSED'){
                        array_push($confirmed_enrollments, $e);
                        $enrollment_p2c->update(['status' => 'PROCESSED']);
                  }  
            }
            
            $date = date('Y-m-d');
            $folder = "/p2c/" . $date;
            $path = storage_path($folder);

            if(!File::exists($path)){
                  File::makeDirectory($path, 0755, true);
                  if(!File::exists($path . '/archive')){
                        File::makeDirectory($path . '/archive', 0755, true);
                  }
            }

            $filename = Carbon::now()->toDateString() . '_' . Carbon::now()->hour . '-' . Carbon::now()->minute;

            \Excel::create($filename, function($excel) use($confirmed_enrollments){
                  $excel->sheet('Sheet 1', function($sheet) use($confirmed_enrollments){
                        $sheet->setColumnFormat(array('Z' => '@'));
                        $sheet->fromArray($confirmed_enrollments);
                  });
            })->store('xls', storage_path($folder));
      }

      public static function sendReminderEmails(){
            $now = Carbon::now();
            $lower = Carbon::now()->subHours(5);
            $customers = \App\Models\Customer::where('created_at', '<', $now)->where('created_at', '>', $lower)->where('status', 'PENDING')->get();
      
            foreach($customers as $customer){
                  $email = $customer->email;
                  $enrollment = $customer->enrollment;
                  $plan = $enrollment->plan;

                  // if this plan has been deleted from the database
                  if($plan === null){
                        $plan = new \App\Models\Plan;
                        $plan['name'] = 'Empty';  
                  }

                  Mail::to($customer->email)->bcc('greatampower@gmail.com', 'GAP')->send(new EnrollmentReminder($customer, $plan, $enrollment));
            }
      }

}

