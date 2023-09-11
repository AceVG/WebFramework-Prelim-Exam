<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        return view('salary-application.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            "ratePerHour" => "required|numeric|min:1",
            "totalHoursWorked" => "required|numeric|min:1",
            "employmentStatus" => "required|in:5000, 2500",
        ]);

        $ratePerHour = $request->input('ratePerHour');
        $totalHoursWorked = $request -> input('totalHoursWorked');
        $employmentStatus = $request -> input('employmentStatus');

        $basicPay = $ratePerHour * $totalHoursWorked;
        $grossPay = $basicPay + $employmentStatus;
        $taxDeduction = $grossPay * .15;
        $netPay = $grossPay - $taxDeduction;

        return view('salary-application.index', compact('ratePerHour', 'totalHoursWorked', 'employmentStatus', 'basicPay', 'grossPay', 'taxDeduction', 'netPay'));
    }
}
