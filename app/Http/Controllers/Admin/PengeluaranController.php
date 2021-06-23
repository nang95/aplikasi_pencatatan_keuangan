<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Exports\PengeluaranExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pengeluaran, Category};
use PDF;

class PengeluaranController extends Controller
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
        $pengeluaran = Pengeluaran::orderBy('id', 'desc');

        // jika pencarian tittle tidak sama dengan kosong/empty
        if(!empty($tittle)){
            $pengeluaran->where('tittle', $tittle);
        }

        $pengeluaran = $pengeluaran->paginate(10);
        // $skipped = ($pengeluaran->perPage() * $pengeluaran->currentPage()) - $pengeluaran->perPage();
        return view('apps.pengeluaran.index')->with('pengeluaran', $pengeluaran)
                                           ->with('tittle', $tittle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('apps.pengeluaran.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pengeluaran::create([
            'type' => $request->type,
            'tittle' => $request->tittle,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => date(now()),
        ]);

        Session::flash('flash_message','Data Berhasil Disimpan');
        return redirect()->route('user.pengeluaran');
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
    public function edit(Pengeluaran $pengeluaran)
    {
        $categories = Category::get();

        return view('apps.pengeluaran.edit')->with('pengeluaran', $pengeluaran)
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
        $pengeluaran = Pengeluaran::findOrFail($request->id);

        $pengeluaran->update($request->all());

        Session::flash('flash_message','Data Berhasil Diubah');
        return redirect()->route('user.pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $pengeluaran = Pengeluaran::findOrFail($request->id);

        $pengeluaran->delete();

        Session::flash('flash_message','Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function cetak(){
        $pengeluaran = Pengeluaran::all();
        $pengeluaran_total = Pengeluaran::sum('price');

        $pdf = PDF::loadview('apps.pengeluaran.cetak',[
                                                     'pengeluaran'=>$pengeluaran, 
                                                     'pengeluaran_total' => $pengeluaran_total
                                                    ]);
        return $pdf->download('laporan-pengeluaran-pdf.pdf');
}
public function export_excel()
{
    return Excel::download(new PengeluaranExport, 'Pengeluaran.xlsx');
}
}
