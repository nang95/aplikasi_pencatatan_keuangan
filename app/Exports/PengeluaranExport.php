<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PengeluaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pengeluarans')->select('tittle', 'categories.name', 'date', 'price')
                        ->join('categories', 'categories.id', '=', 'pengeluarans.category_id')->get();
    }

    public function headings():array {
    	return [
    		'Judul', 'Jenis Pengeluaran', 'Tanggal Pengeluaran', 'Biaya Pengeluaran'
    	];
    }
   
}
