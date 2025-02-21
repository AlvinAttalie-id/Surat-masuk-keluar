@extends('layout.report')
@section('title', 'Laporan Proyek')
@section('content')
    <div class="container">
        <div class="rangkasurat">
            <table width="100%">
                <tr>
                    <td><img src="{{ asset('assets/img/logo-anjas.jpg') }}" width="50px"></td>
                    <td class="tengah">
                        <h2>KANTOR BALAI INSEMINASI BUATAN PROVINSI KALIMANTAN SELATAN</h2>
                        <b>Balai Inseminasi Buatan (BIB) Provinsi Kalimantan Selatan yang beralamat Jl. A. Yani Km.33
                            No.32,
                            Loktabat Selatan, Kota Banjarbaru, Kalimantan Selatan 70712</b>
                    </td>
                </tr>
            </table>
        </div>

        <h2 class="text-center">Laporan Pegawai</h2>

        <!-- Menampilkan posisi yang difilter -->
        @if (request('position'))
            <h3>Posisi: {{ request('position') }}</h3>
        @else
            <h3>Semua Posisi</h3>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Posisi</th>
                    <th>No. HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $key => $pegawai)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->position }}</td>
                        <td>{{ $pegawai->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Signature dan Tanggal -->
        <div class="signature-container">
            <div style="width: 30%; float: right; text-align: right;">
                <div class="text-left" style="text-align: center;">
                    <script>
                        var today = new Date();
                        var monthNames = [
                            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                        ];
                        var formattedDate =
                            "Banjarbaru, " +
                            today.getDate() + " " +
                            monthNames[today.getMonth()] + " " +
                            today.getFullYear();
                        document.write(formattedDate);
                    </script>
                    <br>Menyetujui
                    <br>Kasubag Tata Usaha
                </div>
                <div style="height: 100px;"></div>
                <div class="text-left" style="text-align: center;">
                    (.................................................................................)
                    <br>Henny El Fitri, SE, M.SM.
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
@endsection
@push('before-scripts')
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
@endpush
