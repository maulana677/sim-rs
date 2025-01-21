@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Selamat Datang, {{ auth()->user()->name }}</h2>
                        <p class="lead">Anda hampir sampai, lihat Pasien langsung disini</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pasien</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($countPasien) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
@endpush
