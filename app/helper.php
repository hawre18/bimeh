<?php
use App\Models\DoctorAuth;

if(!function_exists('isDoctorActive'))
{
function isDoctorActive($email) : bool
{
$doctor = DoctorAuth::where('email',$email)->with('IsActive')->exists();

if($doctor)
{
return true;
}
return false;
}
}

