<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use PhpOffice\PhpSpreadsheet\Calculation\Category as CalculationCategory;

class categoryController extends Controller
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
        $category = Category::orderBy('id', 'desc');

        // jika pencarian tittle tidak sama dengan kosong/empty
        if(!empty($tittle)){
            $category->where('name', $tittle);
        }

        $category = $category->paginate(10);
        // $skipped = ($category->perPage() * $category->currentPage()) - $category->perPage();
        return view('apps.category.index')->with('category', $category)
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

        return view('apps.category.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()->route('user.category');
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
    public function edit(category $category)
    {
        $categories = Category::get();

        return view('apps.category.edit')->with('category', $category)
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
        $category = Category::findOrFail($request->id);

        $category->update($request->all());

        return redirect()->route('user.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $category = Category::findOrFail($request->id);

        $category->delete();

        return redirect()->back();
    }
}
