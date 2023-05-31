<?php

namespace App\Exports;

use App\Models\Deposit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepositExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Deposit::with('users')->get()->map(function($deposit){
            return [
                'firtname'=>$deposit->users->first_name,
                'middlename'=>$deposit->users->fiddle_name,
                'lastname'=>$deposit->users->last_name,
                'amount'=>$deposit->amount,
                'status'=>$deposit->status,
                'date'=>$deposit->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'FIRSTNAME',
            'MIDDLENAME',
            'LASTNAME',
            'AMOUNT',
            'STATUS',
            'DATE',
        ];
    }

    public function title(): string
    {
        return "DISTRIBUTION";
    }
}
