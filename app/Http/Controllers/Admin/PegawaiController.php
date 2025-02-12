<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\Pegawai\{
    StorePegawaiRequest,
    UpdatePegawaiRequest
};
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar posisi unik dari tabel users
        $positions = DB::table('users')
            ->where('role_id', 3)
            ->distinct()
            ->pluck('position');

        // Query pegawai dengan filter posisi jika ada
        $pegawais = DB::table('users')
            ->where('role_id', 3)
            ->when($request->position, function ($query) use ($request) {
                return $query->where('position', $request->position);
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.pegawai.index', compact('pegawais', 'positions'));
    }

    public function laporan(Request $request)
    {
        $query = DB::table('users')->where('role_id', 3);

        // Filter berdasarkan position jika ada
        if ($request->has('position') && $request->position != '') {
            $query->where('position', $request->position);
        }

        $pegawais = $query->get();

        return view('admin.pegawai.laporan', compact('pegawais'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(StorePegawaiRequest $request)
    {
        DB::table('users')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt(12345),
            'position'   => $request->position,
            'phone'      => $request->phone,
            'role_id'    => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('pegawai.index')->with('message', 'Pegawai berhasil ditambahkan.');
    }

    public function edit(int $pegawai)
    {
        return view('admin.pegawai.edit', [
            'pegawai' => DB::table('users')->where(['id' => $pegawai, 'role_id' => 3])->first()
        ]);
    }

    public function update(UpdatePegawaiRequest $request, int $pegawai)
    {
        DB::table('users')
            ->where([
                'id'      => $pegawai,
                'role_id' => 3
            ])
            ->update([
                'name'       => $request->name,
                'email'      => $request->email,
                'position'   => $request->position,
                'phone'      => $request->phone,
                'updated_at' => Carbon::now(),
            ]);

        return redirect()->route('pegawai.index')->with('message', 'Pegawai berhasil diedit.');
    }

    public function destroy(int $pegawai)
    {
        DB::table('users')->where(['id' => $pegawai, 'role_id' => 3])->delete();

        return response()->json(['status' => 200, 'message' => 'Pegawai berhasil dihapus.']);
    }
}
