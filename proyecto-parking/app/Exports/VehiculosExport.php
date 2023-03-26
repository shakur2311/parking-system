<?php

namespace App\Exports;

use App\Models\Vehiculo;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehiculosExport implements FromCollection
{
    public function headings(): array
    {
        return [
            'id',
            'Placa',
            'Propietario',
            'Marca',
            'Color',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehiculo::all();
    }
    
}
