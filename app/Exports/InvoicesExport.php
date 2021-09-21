<?php

namespace App\Exports;

use App\Models\invoices;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return invoices::select(
            'invoice_number' ,
            'invoice_Date' ,
            'Due_date' ,
            'product' ,
            'Amount_collection' ,
            'Discount' ,
            'Value_VAT',
            'Rate_VAT' ,
            'Total',
            'Status',
            'note');
    }
}


