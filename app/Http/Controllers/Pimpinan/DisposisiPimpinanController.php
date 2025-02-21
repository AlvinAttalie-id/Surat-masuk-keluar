<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisposisiPimpinanController extends Controller
{
    public function index()
    {
        $disposisis = DB::table('dispositions')
            ->join('users', 'users.id', '=', 'dispositions.user_id')
            ->join('incoming_letters', 'incoming_letters.id', '=', 'dispositions.incoming_letter_id')
            ->select('dispositions.*', 'users.name as pegawai', 'users.position', 'incoming_letters.no_letter as no_surat', 'incoming_letters.regarding as perihal')
            ->paginate(10);

        return view('pimpinan.disposisi.index', compact('disposisis'));
    }

    public function laporan(Request $request)
    {
        $query = DB::table('dispositions')
            ->join('users', 'users.id', '=', 'dispositions.user_id')
            ->join('incoming_letters', 'incoming_letters.id', '=', 'dispositions.incoming_letter_id')
            ->select(
                'dispositions.*',
                'users.name as pegawai',
                'users.position',
                'incoming_letters.no_letter as no_surat',
                'incoming_letters.regarding as perihal'
            );

        // Jika ada filter tanggal, gunakan kolom "deadline"
        if ($request->has(['start_date', 'end_date'])) {
            $query->whereBetween('dispositions.deadline', [$request->start_date, $request->end_date]);
        }

        $disposisis = $query->get();

        return view('pimpinan.disposisi.laporan', compact('disposisis'));
    }


    public function create()
    {
        return view('pimpinan.disposisi.create', [
            'pegawais'    => DB::table('users')
                ->where('role_id', 3)
                ->select('id', 'name', 'position')
                ->orderBy('name')
                ->get(),
            'suratmasuks' => DB::table('incoming_letters')
                ->select('id', 'no_letter', 'regarding')
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tujuan' => 'required|exists:users,id', // Pastikan "tujuan" ada di tabel users
            'suratmasuk' => 'required|exists:incoming_letters,id',
            'purpose' => 'required|string',
            'deadline' => 'required|date',
            'content' => 'required|string',
        ], [
            //error Message
            'tujuan.required' => 'Pegawai tujuan harus dipilih.',
            'suratmasuk.required' => 'Surat Masuk harus dipilih.',
            'purpose.required' => 'Perihal harus dipilih.',
            'deadline.required' => 'Batas Waktu harus Diisi.',
            'content.required' => 'Isi harus Diisi.',


            'tujuan.exists' => 'Pegawai yang dipilih tidak valid.',
        ]);

        DB::table('dispositions')->insert([
            'user_id' => $request->tujuan,
            'incoming_letter_id' => $request->suratmasuk,
            'purpose' => $request->purpose,
            'deadline' => $request->deadline,
            'status' => 1,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pimpinan.disposisi.index')->with('message', 'Disposisi berhasil ditambahkan.');
    }

    public function show(int $disposisi)
    {
        $disposisi = DB::table('dispositions')
            ->select('dispositions.*', 'users.name as pegawai', 'users.position', 'incoming_letters.no_letter as no_surat', 'incoming_letters.regarding as perihal')
            ->join('users', 'users.id', '=', 'dispositions.user_id')
            ->join('incoming_letters', 'incoming_letters.id', '=', 'dispositions.incoming_letter_id')
            ->where('dispositions.id', $disposisi)
            ->first();

        return view('pimpinan.disposisi.detail', compact('disposisi'));
    }

    public function edit(int $disposisi)
    {
        $pegawais     = DB::table('users')
            ->where('role_id', 3)
            ->select('id', 'name', 'position')
            ->orderBy('name')
            ->get();

        $suratmasuks = DB::table('incoming_letters')
            ->select('id', 'no_letter', 'regarding')
            ->orderBy('id', 'DESC')
            ->get();

        $disposisi   = DB::table('dispositions')
            ->select('dispositions.*', 'users.name as pegawai', 'users.position', 'incoming_letters.no_letter as no_surat', 'incoming_letters.regarding as perihal')
            ->join('users', 'users.id', '=', 'dispositions.user_id')
            ->join('incoming_letters', 'incoming_letters.id', '=', 'dispositions.incoming_letter_id')
            ->where('dispositions.id', $disposisi)
            ->first();

        return view('pimpinan.disposisi.edit', compact('pegawais', 'suratmasuks', 'disposisi'));
    }

    public function update(Request $request, int $disposisi)
    {
        DB::table('dispositions')
            ->where('id', $disposisi)
            ->update([
                'user_id'            => $request->tujuan,
                'incoming_letter_id' => $request->suratmasuk,
                'purpose'            => $request->purpose,
                'deadline'           => $request->deadline,
                'content'            => $request->content,
                'updated_at'         => Carbon::now(),
            ]);

        return redirect()->route('pimpinan.disposisi.index')->with('message', 'Disposisi berhasil diedit.');
    }

    public function destroy(int $disposisi)
    {
        DB::table('dispositions')->where('id', $disposisi)->delete();

        return response()->json(['status' => 200, 'message' => 'Disposisi berhasil dihapus.']);
    }
}
