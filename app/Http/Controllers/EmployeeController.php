<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        return view("index");
    }
    public function store(Request $request) {
       $file = $request->file('avatar');
       $fileName = time() . "." . $file->getClientOriginalExtension();
       $file->storeAs('public/images', $fileName);
       $empData = [
        "first_name" => $request->fname,
        "last_name" => $request->lname,
        "email" => $request->email,
        "phone" => $request->phone,
        "post" => $request->post,
        "avatar" => $fileName
       ];
       Employee::create($empData);
       return response()->json([
        'status'=> 200,
       ]);

    }
}
