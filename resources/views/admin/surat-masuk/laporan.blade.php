<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Proyek</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            border-bottom: 5px solid black;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .signature-container {
            margin-top: 20px;
            padding: 10px;
            position: relative;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>
<div class="container">
    <h2 class="text-center">Laporan Surat Masuk</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>No Surat</th>
                <th>Perihal</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratmasuks as $key => $surat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->no_letter }}</td>
                    <td>{{ $surat->regarding }}</td>
                    <td>{{ $surat->date_letter }}</td>
                    <td>{{ $surat->date_received }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Script untuk langsung mencetak laporan --}}
<script>
    window.onload = function() {
        window.print();
    };
</script>
