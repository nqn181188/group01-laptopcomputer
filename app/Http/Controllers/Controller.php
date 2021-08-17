<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    // public function showSweetAlertMessages(){

    //     // Flash messages settings
    
    //     session()->flash("success", "This is success message");

    //     session()->flash("warning", "This is warning message");

    //     session()->flash("info", "This is information message");

    //     session()->flash("error", "This is error message");

    //     return view("sweetalert-notification");
    // }
}
