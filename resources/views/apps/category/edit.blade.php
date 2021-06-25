@extends('layouts.master')
@section('kontem')
    <div class="container tm-mb-big">
      <div class="row mt-5">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Tambah Kategori</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                <form action="{{ route('user.category.update') }}" class="tm-edit-product-form" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}
                        
                        <input type="hidden" value="{{ $category->id }}" name="id">

                        <div class="form-group mb-3">
                        <label for="category">Tipe</label>
                          <select class="custom-select tm-select-accounts" name="type" id="category_id">
                              <option selected>Pilih Tipe</option>
                              <option value="Pemasukan" {{ $category->type == "Pemasukan" ? 'selected' : '' }}>Pemasukan</option>
                              <option value="Pengeluaran" {{ $category->type == "Pengeluaran" ? 'selected' : '' }}>Pengeluaran</option>
                          </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Kategori</label>
                            <input type="text" class="form-control validate" rows="3" name="name" value="{{ $category->name }}" required />
                        </div>
                                
                        <div class="row mt-4">
                            <div class="mb-3 col-sm-6">
                                <a href="{{ route('user.category') }}">
                                    <button class="button-lg button-danger" type="button">Batal</button>
                                </a>
                            </div>
                            <div class="form-group mb-3 col-xs-12 col-sm-6" style="text-align: right">
                                <button class="button-lg button-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
