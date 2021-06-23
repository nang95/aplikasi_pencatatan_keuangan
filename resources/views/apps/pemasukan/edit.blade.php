@extends('layouts.master')
@section('kontem')
    <div class="container tm-mb-big">
      <div class="row mt-5">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Tambah Catatan Pemasukan</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <form action="{{ route('user.pemasukan.update') }}" class="tm-edit-product-form" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $pemasukan->id }}">

                        <div class="form-group mb-3">
                            <label for="description">Judul</label>
                            <input type="text" class="form-control validate" rows="3" name="tittle" value="{{ $pemasukan->tittle }}" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Keterangan</label>
                            <textarea class="form-control validate" rows="3" name="description" required>{{ $pemasukan->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category_id">Kategori</label>
                            <select class="custom-select tm-select-accounts" name="category_id" id="category_id">
                                <option selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                    @if ($category->id == $pemasukan->category_id)
                                        selected
                                    @endif >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Harga</label>
                            <input type="number" name="price" class="form-control validate" value="{{ $pemasukan->price }}">
                        </div>
                        <div class="row mt-4">
                            <div class="mb-3 col-sm-6">
                                <a href="{{ route('user.pemasukan') }}">
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
