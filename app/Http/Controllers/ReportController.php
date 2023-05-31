<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use App\Models\Loan;

use Illuminate\Http\Request;
use App\Exports\DepositExport;
use App\Exports\LoanExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function contributionReport()
    {
        $contributions = Deposit::get();
        return view('backend.reports.contribution', compact('contributions'));
    }

    public function loanReport()
    {
        $loans = Loan::get();

        return view('backend.reports.loan', compact('loans'));
    }

    public function exportDeposit()
    {
        return Excel::download(new DepositExport, 'deposit.xlsx');
    }
    public function exportLoan()
    {
        return Excel::download(new LoanExport, 'deposit.xlsx');
    }
}
