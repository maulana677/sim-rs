@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pasien</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></div>
                <div class="breadcrumb-item">Detail Pasien</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Pasien: {{ $pasien->nama }}</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pasien</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $pasien->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td>{{ $pasien->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $pasien->email }}</td>
                                </tr>
                                <tr>
                                    <th>No Identitas</th>
                                    <td>{{ $pasien->no_identitas }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
