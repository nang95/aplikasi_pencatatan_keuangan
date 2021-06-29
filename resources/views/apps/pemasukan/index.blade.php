@extends('layouts.master')
@section('kontem')
    @if(Session::has('flash_message'))
    <script type="text/javascript">
        Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
    </script>
    @endif
    <div class="container tm-mb-big">

      <div class="row tm-content-row mt-5">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">Data Pemasukan</h2>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('user.pemasukan.create') }}">
                                <button class="button button-success">Tambah Data</button>
                            </a>
                            <button class="button button-success" data-toggle="modal" data-target="#modalCetak">Cetak PDF</button>
                            <a href="{{ route('user.pemasukan.excel') }}">
                                <button class="button button-success">Cetak Excel</button>
                            </a>

                        </div>
                        <div class="col-6" style="text-align: right">
                            <form action="{{ route('user.pemasukan') }}" method="GET">
                                <input type="text" name="tittle" value="{{ $tittle }}">
                                <button class="button button-info">Cari</button>
                            </form>
                        </div>
                    </div>
                    <p></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemasukan as $data_pemasukan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data_pemasukan->tittle }}</td>
                                <td>{{ $data_pemasukan->category->name }}</td>
                                <td>{{ $data_pemasukan->price }}</td>
                                <td>{{ $data_pemasukan->date }}</td>
                                <td>
                                    <a href="{{ route('user.pemasukan.edit', $data_pemasukan->id) }}">
                                    <button class="button button-warning">Edit</button>
                                    </a>
                                    <button 
                                        class="button button-info detail" 
                                        data-toggle="modal"
                                        data-target="#exampleModalCenter"
                                        data-id="{{ $data_pemasukan->id }}"
                                        data-tittle="{{ $data_pemasukan->tittle }}"
                                        data-category="{{$data_pemasukan->category->name}}"
                                        data-price="{{$data_pemasukan->price}}"
                                        data-date="{{$data_pemasukan->date}}"
                                        data-description="{{$data_pemasukan->description}}"
                                         >Detail</button>
                                    <form action="{{ route('user.pemasukan.delete') }}" method="POST" style="display: inline-block">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $data_pemasukan->id }}">
                                        <button class="button button-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pemasukan->appends(['tittle' => $tittle])->links() }}
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom:10px">
                    <div>Judul</div>
                    <div id="item-tittle">Nama Pemasukan</div>
                </div>

                <div style="margin-bottom:10px">
                    <div>Kategori</div>
                    <div id="item-category">Nama Pemasukan</div>
                </div>

                <div style="margin-bottom:10px">
                    <div>Jumlah</div>
                    <div id="item-price">Nama Pemasukan</div>
                </div>

                <div style="margin-bottom:10px">
                    <div>Tanggal</div>
                    <div id="item-date">Nama Pemasukan</div>
                </div>

                <div style="margin-bottom:10px">
                    <div>Keterangan</div>
                    <div id="item-description">Nama Pemasukan</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button-lg button-info" type="button">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #435c70">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white">Cetak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.pemasukan.cetak') }}" class="tm-edit-product-form" method="POST">
            <div class="modal-body">
                @csrf @method('POST')

                <div class="form-group mb-3">
                    <label for="type">Cetak Berdasarkan : </label>
                    <select class="custom-select tm-select-accounts" name="type" id="type">
                        <option selected>- Silahkan Pilih -</option>
                        <option value="per_hari">Hari ini</option>
                        <option value="per_minggu">Minggu Ini</option>
                        <option value="per_bulan">Bulan Ini</option>
                        <option value="semua">Semua</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button-lg button-info" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script>
        let tittle = document.getElementById('item-tittle');
        let category = document.getElementById('item-category');
        let price = document.getElementById('item-price');
        let date = document.getElementById('item-date');
        let description = document.getElementById('item-description');
        let detailButtons = document.getElementsByClassName('detail');

        Array.from(detailButtons).forEach(function(detailButton){
            detailButton.addEventListener('click', function(obj){
                tittle.innerHTML = detailButton.getAttribute('data-tittle');
                category.innerHTML = detailButton.getAttribute('data-category');
                price.innerHTML = detailButton.getAttribute('data-price');
                date.innerHTML = detailButton.getAttribute('data-date');
                description.innerHTML = detailButton.getAttribute('data-description');
            });
        });

    </script>
@endsection