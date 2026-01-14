<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ExpenseServices;
use App\Services\IncomeServices;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function getTotalExpenses(ExpenseServices $expenseServices) {

    }


    public function getTotalIncome(IncomeServices $incomeServices) {
        
    }
}
