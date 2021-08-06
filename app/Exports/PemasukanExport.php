<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;


class PemasukanExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $type;

    function __construct($type){
        $this->type = $type;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $carbon = new Carbon(now());
        $startOfMonth = $carbon->startOfMonth()->toDateString();
        $endOfMonth = $carbon->endOfMonth()->toDateString();
        $next_sunday = date('Y-m-d',strtotime('next sunday'));
        $previous_sunday = date('Y-m-d',strtotime('previous sunday'));
        
        $pemasukan = new Pemasukan;

        
        switch ($this->type) {
            case 'per_hari':
                $pemasukan = $pemasukan->where('date', date('Y-m-d'))->get();
                break;
            case 'per_minggu':
                $pemasukan = $pemasukan->where('date', '<=', $next_sunday)->get();
                break;
            case 'per_bulan':
                $pemasukan = $pemasukan->where('date', '>=', $startOfMonth)
                          ->where('date', '<=', $endOfMonth)->get();
                break;
            case 'semua':
                $pemasukan = $pemasukan->get();
                break;
        }        

        $return = [];
        foreach ($pemasukan as $item) {
            array_push($return, [
                'tittle' => $item->tittle,
                'category_id' => $item->category->name,
                'date' => $item->date,
                'price' => $item->price,
            ]);
        }

        return collect([$return]);
    }

    public function headings():array {
    	return [
    		'Judul', 'Jenis Pemasukan', 'Tanggal Pemasukan', 'Biaya Pemasukan'
    	];
    }
   
}
