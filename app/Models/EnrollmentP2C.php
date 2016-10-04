<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class EnrollmentP2C extends Model
{  
	public $table = 'enrollments_p2c';
    
    public $timestamps = false;

	public $fillable = [
	    'Revenue_Class_Desc',
		'First_Name',
		'Last_Name',
		'Customer_Name',
		'Home_Phone_Num',
		'Work_Phone_Num',
		'Fed_Tax_Id_Num',
		'Email_Address',
		'Language_Pref_Code',
		'Contact_Name',
		'SLine1_Addr',
		'SLine2_Addr',
		'SCity_Name',
		'SPostal_Code',
		'Marketer_Name',
		'Distributor_Name',
		'Service_Type_Desc',
		'Bill_Method',
		'LDC_Account_Num',
		'Enroll_Type_Desc',
		'Requested_Start_Date',
		'Plan_Desc',
		'Contract_Start_Date',
		'Contract_End_Date',
		'Agent_Code',
		'Commission_Plan',
		'Commission_Start_Date',
		'Commission_End_Date',
		'MLine1_Addr',
		'MLine2_Addr',
		'MCity_Name',
		'MPostal_Code',
		'MState',
		'Master_Code'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
	    'Revenue_Class_Desc'      => 'string',
		'First_Name'              => 'string',
		'Last_Name'               => 'string',
		'Customer_Name'           => 'string',
		'Home_Phone_Num'          => 'string',
		'Work_Phone_Num'          => 'string',
		'Fed_Tax_Id_Num'          => 'string',
		'SLine1_Addr'             => 'string',
		'SCity_Name'              => 'string',
		'SCounty_Name'            => 'string',
		'SPostal_Code'            => 'string',
		'Marketer_Name'           => 'string',
		'Distributor_Name'        => 'string',
		'Service_Type_Desc'       => 'string',
		'Bill_Method'             => 'string',
		'LDC_Account_Num'         => 'string',
		'Enroll_Type_Desc'        => 'string',
		'Requested_Start_Date'    => 'string',
		'Plan_Desc'				  => 'string'
    ];

	public static $rules = [
	    'Revenue_Class_Desc'      => 'required',
		'SLine1_Addr'             => 'string',
		'SCity_Name'              => 'string',
		'SCounty_Name'            => 'string',
		'SPostal_Code'            => 'string',
		'Marketer_Name'           => 'string',
		'Distributor_Name'        => 'string',
		'Service_Type_Desc'       => 'string',
		'Bill_Method'             => 'string',
		'LDC_Account_Num'         => 'string',
		'Enroll_Type_Desc'        => 'string',
		'Requested_Start_Date'    => 'string',
		'Plan_Desc'				  => 'string'
	];
}
