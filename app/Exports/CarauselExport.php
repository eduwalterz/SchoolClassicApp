<?php

namespace App\Exports;

use App\Carausel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CarauselExport implements FromCollection,WithHeadings
{
    
    public function headings():array{
        return[
            'id',
            'image_name',
            'image'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return carausel::all();
        //return collect(carausel::getCarausels());
    }
}
