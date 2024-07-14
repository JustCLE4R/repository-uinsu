@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Beranda Admin</span>
                            <hr />
                        </div>
                    </div>


                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            
                            <div class="col-lg-9 col-sm-12 text-start">
                                <span class="h6">Data Jumlah Pengunduh Arsip</span>
                            </div>
                            <div class="col-lg-3  col-sm-12 ">
                                <select class="form-select" aria-label="Default select example" >
                                    <option selected>Pilih Tahun</option>
                                    <option value="1">2021</option>
                                    <option value="2">2022</option>
                                    <option value="3">2023</option>
                                </select>
                            </div>
                        
                            <canvas id="unduh" width="400" height="200"></canvas>
                        </div>

                        <div class="row my-5">
                            
                            <div class="col-lg-9 col-sm-12 text-start">
                                <span class="h6">Data Jumlah Pengunggah Arsip</span>
                            </div>
                            <div class="col-lg-3  col-sm-12 ">
                                <select class="form-select" aria-label="Default select example" >
                                    <option selected>Pilih Tahun</option>
                                    <option value="1">2021</option>
                                    <option value="2">2022</option>
                                    <option value="3">2023</option>
                                </select>
                            </div>
                        
                            <canvas id="unggah" width="400" height="200"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('unduh').getContext('2d');
        const unduh = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Data Bulanan',
                    data: [11, 20, 5, 30, 35, 15, 20, 8, 20, 10, 34, 10],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('unggah').getContext('2d');
        const unggah = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Data Bulanan',
                    data: [11, 20, 5, 30, 35, 15, 20, 8, 20, 10, 34, 10],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
