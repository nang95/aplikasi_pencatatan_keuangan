@extends('layouts.master')
@section('kontem')
    <div class="container tm-mb-big">

      <div class="row tm-content-row mt-5">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">Data Kategori</h2>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{ route('user.category.create') }}">
                                <button class="button button-success">Tambah Data</button>
                            </a>
                        </div>
                        <div class="col-9" style="text-align: right">
                            <form action="{{ route('user.category') }}" method="GET">
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
                                <th scope="col">Tipe</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $data_category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data_category->type}}</td>
                                <td>{{ $data_category->name }}</td>
                                <td>
                                    <a href="{{ route('user.category.edit', $data_category->id) }}">
                                    <button class="button button-warning">Edit</button>
                                    </a>
                                    <form action="{{ route('user.category.delete') }}" method="POST" style="display: inline-block">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $data_category->id }}">
                                        <button class="button button-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$category->appends(['tittle' => $tittle])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
