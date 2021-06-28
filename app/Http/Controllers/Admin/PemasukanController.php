<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Exports\PemasukanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pemasukan, Category};
use PDF;
use Carbon\Carbon;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tittle = $request->tittle;
        // tampil data
        $pemasukan = Pemasukan::orderBy('id', 'desc');

        // jika pencarian tittle tidak sama dengan kosong/empty
        if(!empty($tittle)){
            $pemasukan->where('tittle', $tittle);
        }

        $pemasukan = $pemasukan->paginate(10);
        // $skipped = ($pemasukan->perPage() * $pemasukan->currentPage()) - $pemasukan->perPage();
        return view('apps.pemasukan.index')->with('pemasukan', $pemasukan)
                                           ->with('tittle', $tittle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','Pemasukan')->get();

        return view('apps.pemasukan.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemasukan::create([
            'type' => $request->type,
            'tittle' => $request->tittle,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => date(now()),
        ]);

        Session::flash('flash_message','Data Berhasil Disimpan');
        return redirect()->route('user.pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        $categories = Category::get();

        return view('apps.pemasukan.edit')->with('pemasukan', $pemasukan)
                                          ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // ambil data pengeluaran yang id nya yg dipilih tadi
        $pemasukan = Pemasukan::findOrFail($request->id);

        $pemasukan->update($request->all());
        
        Session::flash('flash_message','Data Berhasil Diubah');
        return redirect()->route('user.pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $pemasukan = Pemasukan::findOrFail($request->id);

        $pemasukan->delete();

        Session::flash('flash_message','Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function cetak(Request $request){
        $carbon = new Carbon(now());
        $startOfMonth = $carbon->startOfMonth()->toDateString();
        $endOfMonth = $carbon->endOfMonth()->toDateString();
        $next_sunday = date('Y-m-d',strtotime('next sunday'));
        $previous_sunday = date('Y-m-d',strtotime('previous sunday'));

        $pemasukan = new Pemasukan;

        switch ($request->type) {
            case 'per_hari':
                $pemasukan->where('date', date('Y-m-d'));
                $pemasukan = $pemasukan->get();
                break;
            case 'per_minggu':
                $pemasukan->where('date', '<=', $next_sunday);
                $pemasukan = $pemasukan->get();
                break;
            case 'per_bulan':
                $pemasukan->where('date', '>=', $startOfMonth)
                          ->where('date', '<=', $endOfMonth);
                $pemasukan = $pemasukan->get();
                break;
            case 'semua':
                $pemasukan = $pemasukan->get();
                break;
        }
    
        $pemasukan_total = $pemasukan->sum('price');

        $pdf = PDF::loadview('apps.pemasukan.cetak',[
                                                     'pemasukan'=>$pemasukan, 
                                                     'pemasukan_total' => $pemasukan_total
                                                    ]);
        return $pdf->download('laporan-pemasukan-pdf.pdf');
    }

public function export_excel()
{
    return Excel::download(new PemasukanExport, 'Pemasukan.xlsx');
}

}
