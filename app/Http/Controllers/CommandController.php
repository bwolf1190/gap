<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Carbon\Carbon;

class CommandController extends Controller
{
    
    /**
     * Sends P2C Enrollments
     * Static method so it can be called by Artisan command
     */
    public static function sendP2CEnrollments(){ 
        $now = Carbon::now();
        $headers = "Revenue_Class_Desc  First_Name  Last_Name   Customer_Name   Home_Phone_Num  Work_Phone_Num  Social_Sec_Code Fed_Tax_Id_Num  Cellular_Num    Email_Address   Language_Pref_Code  Credit_Score_Num    Contact_Name    SLine1_Addr SLine2_Addr SCity_Name  SCounty_Name    SPostal_Code    Marketer_Name   Distributor_Name    Service_Type_Desc   Bill_Method LDC_Account_Num Enroll_Type_Desc    Requested_Start_Date    Special_Meter_Read_Date Waive_Notification_Ind  Tax_Exemption_Ind   Plan_Desc   Contract_Start_Date Contract_End_Date   Fixed_Commodity_Amt Agent_Code  Commission_Plan Commission_Start_Date   Commission_End_Date Commission_Unit_Num Promotion_Code  Ad_Source_Desc  MLine1_Addr MLine2_Addr MLine3_Addr MLine4_Addr MCity_Name  MState  MCountry_Name   MPostal_Code    Employee_Ind    Low_Income_Ind  Life_Support_Ind    Interruptible_Ind   Approx_Annual_Usage Budget_Amt  Deposit_Installment_Amt Deposit_Installment_Qty Security_Question   Security_Answer Employer_Name   Drivers_Lic_Num Drivers_Lic_State_Code  Verification_Type_Desc  Confirmation_Code   Commission_Master_Unit_Num  Master_Code Index_Adder_Num Billing_Pkg_Name    Account_Name    ExportFileName  ExportDate  Commission_Sub_Agent_Unit_Num   Sub_Agent_Code  Supply_Zone_Desc    Fax_Num Equipment_Id_Code   Rto_Amt Payment_Type_Desc   Payment_Subscriber_Id_Code  Fixed_Charge_Amt    Legacy_Account_Num  Legacy_Id   Birth_Date  Enrollment_Source_Code  Esignature_Code Commission_2_Plan   Commission_2_Start_Date Commission_2_End_Date   Commission_2_Agent_Unit_Num Commission_2_Master_Unit_Num    Commission_2_Sub_Unit_Num   Deposit_Suggested_Amt   Group_Desc  Landlord_Agreement_Id_Desc  Attention_Name  Service_Priority_Desc   Delivery_Method_Desc    Heat_Rate_Num   Rep_Adder_Num   Work_Ext_Num    Credit_Rating_Source_Desc   Min_Index_Num   Max_Index_Num   Delinquent_Days_Cnt Request_Hist_Usage_Ind  Request_Hist_Interval_Ind   Interval_Ind    Interval_Non_Edi_Ind";
        $headers = preg_split('/\s+/', $headers);
        //dd($now->subHour());
        //$enrollments = \App\Models\EnrollmentP2C::where('Requested_Start_Date', '<', $now->subHours(24))->get();
        $enrollments = \App\Models\EnrollmentP2C::all();
        $filepath = storage_path('p2c/' . $now->toDateString() . '_' . $now->hour . '-' . $now->minute . '.txt');
        $file = fopen($filepath, "a");

        foreach($headers as $h){
            fputs($file, $h . "\t");
        }

        fputs($file, "\r\n");

        foreach($enrollments as $e){
            fputs($file, $e->Revenue_Class_Desc   . "\t");
            fputs($file, $e->First_Name           . "\t");
            fputs($file, $e->Last_Name            . "\t");
            fputs($file, $e->Customer_Name        . "\t");
            fputs($file, $e->Home_Phone_Num       . "\t");
            fputs($file, $e->Work_Phone_Num       . "\t");
            fputs($file, $e->Fed_Tax_Id_Num       . "\t");
            fputs($file, $e->Email_Address        . "\t");
            fputs($file, $e->Contact_Name         . "\t");
            fputs($file, $e->SLine1_Addr          . "\t");
            fputs($file, $e->SLine2_Addr          . "\t");
            fputs($file, $e->SCity_Name           . "\t");
            fputs($file, $e->SPostal_Code         . "\t");
            fputs($file, $e->Marketer_Name        . "\t");
            fputs($file, $e->Distributor_Name     . "\t");
            fputs($file, $e->Service_Type_Desc    . "\t");
            fputs($file, $e->Bill_Method          . "\t");
            fputs($file, $e->LDC_Account_Num      . "\t");
            fputs($file, $e->Enroll_Type_Desc     . "\t");
            fputs($file, $e->Requested_Start_Date . "\t");
            fputs($file, $e->Plan_Desc            . "\t");
            fputs($file, $e->Contract_Start_Date  . "\t");
            fputs($file, $e->Contract_End_Date    . "\t");
            fputs($file, $e->Agent_Code           . "\t");
            fputs($file, $e->Commission_Plan      . "\t");
            fputs($file, $e->MLine1_Addr          . "\t");
            fputs($file, $e->MLine2_Addr          . "\t");
            fputs($file, $e->MCity_Name           . "\t");
            fputs($file, $e->MPostal_Code         . "\t");
            fputs($file, $e->MState               . "\t");
            fputs($file, $e->Master_Code          . "\t");
            //fputs($file, "\r\n");
        }

        fclose($file);
        
    }
}
