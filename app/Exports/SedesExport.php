<?php

namespace App\Exports;

use App\Models\Sede;
use Maatwebsite\Excel\Concerns\FromCollection;

class SedesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sede::all();
    }
}
