<?php

namespace App\Exports;

use App\Models\CSV;
use Maatwebsite\Excel\Concerns\FromCollection;

class CSVExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CSV::all();
    }
}
