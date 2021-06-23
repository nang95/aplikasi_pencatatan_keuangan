@extends('layouts.master')
@section('kontem')
    <div class="container tm-mb-big">
    <div class="row mt-3">
            <div class="col-4">
                <div class="widget widget-day">
                    <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                          <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pemasukan Hari Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pemasukan_hari_ini) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="widget widget-week">
                <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                        <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pemasukan Minggu Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pemasukan_minggu_ini) }}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="widget widget-month">
                <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                        <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pemasukan Bulan Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pemasukan_bulan_ini)}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4">
                <div class="widget widget-day">
                    <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pengeluaran Hari Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pengeluaran_hari_ini)}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="widget widget-week">
                <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pengeluaran Minggu Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pengeluaran_minggu_ini) }}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="widget widget-month">
                <div class="widget-body">
                        <!-- icon -->
                        <div class="widget-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-text">
                            <div class="widget-title">Jumlah Pengeluaran Bulan Ini</div>
                            <div class="widget-counter">Rp. {{ number_format($pengeluaran_bulan_ini)}}</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
