<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $companies = Company::query()->count();
        $employees = Employee::query()->count();
        return view('pages.index',compact('companies','employees'));
    }
}
