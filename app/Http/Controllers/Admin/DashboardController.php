<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pemasukan, Pengeluaran};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $carbon = new Carbon(now());
        $startOfMonth = $carbon->startOfMonth()->toDateString();
        $endOfMonth = $carbon->endOfMonth()->toDateString();
        $next_sunday = date('Y-m-d',strtotime('next sunday'));
        $previous_sunday = date('Y-m-d',strtotime('previous sunday'));
        
        // jumlah pembayaran pemasukan
        $pemasukan_hari_ini = Pemasukan::where('date', date('Y-m-d'))->sum('price');
        $pemasukan_minggu_ini = Pemasukan::where('date', '<=', $next_sunday)
                                            ->where('date', '>=', $previous_sunday)->sum('price');
        $pemasukan_bulan_ini = Pemasukan::where('date', '>=', $startOfMonth)
                                            ->where('date', '<=', $endOfMonth)->sum('price');

        // jumlah pembayaran pengeluaran
        $pengeluaran_hari_ini = Pengeluaran::where('date', date('Y-m-d'))->sum('price');
        $pengeluaran_minggu_ini = Pengeluaran::where('date', '<=', $next_sunday)
                                            ->where('date', '>=', $previous_sunday)->sum('price');
        $pengeluaran_bulan_ini = Pengeluaran::where('date', '>=', $startOfMonth)
                                            ->where('date', '<=', $endOfMonth)->sum('price');
        

        return view('apps.dashboard')->with('pemasukan_hari_ini', $pemasukan_hari_ini)
                                     ->with('pemasukan_minggu_ini', $pemasukan_minggu_ini)
                                     ->with('pemasukan_bulan_ini', $pemasukan_bulan_ini)
                                     ->with('pengeluaran_hari_ini', $pengeluaran_hari_ini)
                                     ->with('pengeluaran_minggu_ini', $pengeluaran_minggu_ini)
                                     ->with('pengeluaran_bulan_ini', $pengeluaran_bulan_ini);

    }
}
