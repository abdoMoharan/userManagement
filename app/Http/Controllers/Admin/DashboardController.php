<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function dashboard(){
    $users = User::count();
    return view('admin.pages.index',compact('users'));
   }
}
