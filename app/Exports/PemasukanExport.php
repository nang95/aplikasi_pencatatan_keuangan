<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PemasukanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pemasukans')->select('tittle', 'categories.name', 'date', 'price')
                        ->join('categories', 'categories.id', '=', 'pemasukans.category_id')->get();
    }

    public function headings():array {
    	return [
    		'Judul', 'Jenis Pemasukan', 'Tanggal Pemasukan', 'Biaya Pemasukan'
    	];
    }
   
}
