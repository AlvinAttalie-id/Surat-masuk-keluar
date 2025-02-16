@extends('layout.report')
@section('title', 'Laporan Proyek')
@section('content')

    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td><img src="{{ asset('assets/img/logo-anjas.jpg') }}" width="50px"></td>
                <td class="text-center">
                    <h2>KANTOR BALAI INSEMINASI BUATAN PROVINSI KALIMANTAN SELATAN</h2>
                    <b>Balai Inseminasi Buatan (BIB) Provinsi Kalimantan Selatan yang beralamat Jl. A. Yani Km.33 No.32,
                        Loktabat Selatan, Kota Banjarbaru, Kalimantan Selatan 70712</b>
                </td>
            </tr>
        </table>
    </div>
    <h2 class="text-center">Laporan Surat Masuk</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pegawai</th>
                <th>No Surat</th>
                <th>Perihal</th>
                <th>Tanggal Disposisi</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disposisis as $key => $disposisi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $disposisi->pegawai }}</td>
                    <td>{{ $disposisi->no_surat }}</td>
                    <td>{{ $disposisi->perihal }}</td>
                    <td>{{ \Carbon\Carbon::parse($disposisi->created_at)->format('d-m-Y') }}</td>
                    <!-- Format the date of disposition -->
                    <td>{{ $disposisi->purpose }}</td> <!-- Assuming the "Tujuan" is the purpose of the disposition -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Signature and print script -->
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
@endsection
@push('before-scripts')
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
@endpush
