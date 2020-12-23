<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
class ReportController extends Controller
{
    public function getReport(Request $request){
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        $mess = $request->mess;
        $report = new Report();
        $report->name = $name;
        $report->phone = $phone;
        $report->email = $email;
        $report->mess = $mess;
        $report->save();
        return response()->json([
            $email, $name, $phone, $mess
        ], 200);
    }
}
