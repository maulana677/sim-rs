@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Patients</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Patients</a></div>
                <div class="breadcrumb-item">All Patients</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All Patients</h2>
            <p class="section-lead">
                On this page, you can see all the patients data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Patients</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.patients.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">No</th>
                                            <th>Name</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>ID Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pasiens as $pasien)
                                            <tr>
                                                <td class="text-left">{{ ++$loop->index }}</td>
                                                <td>{{ $pasien->nama }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}
                                                </td>
                                                <td>{{ $pasien->jenis_kelamin }}</td>
                                                <td>{{ $pasien->alamat }}</td>
                                                <td>{{ $pasien->no_hp }}</td>
                                                <td>{{ $pasien->email ?? 'No Email' }}</td>
                                                <td>{{ $pasien->no_identitas }}</td>
                                                <td>
                                                    <a href="{{ route('admin.patients.edit', $pasien->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.patients.destroy', $pasien->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                    <a href="{{ route('admin.patients.show', $pasien->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50],
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "language": {
                    "emptyTable": "Tidak ada data yang tersedia"
                },
                "destroy": true,
            });
        });
    </script>
@endpush
