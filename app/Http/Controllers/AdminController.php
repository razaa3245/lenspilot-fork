<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //public function dashboard()
public function dashboard()
{
    return view('admin.adminboard'); // make sure this view exists
}


}
