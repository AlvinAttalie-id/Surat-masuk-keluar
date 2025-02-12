<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Pengirim\{
    StorePengirimRequest,
    UpdatePengirimRequest
};
use Illuminate\Http\Request;

class PengirimController extends Controller
{
    public function index()
    {
        return view('admin.pengirim.index', ['pengirims' => DB::table('senders')->orderBy('id', 'DESC')->paginate(10)]);
    }

    public function laporan(Request $request)
    {
        $query = DB::table('senders');

        $senders = $query->get();

        return view('admin.pengirim.laporan', compact('senders'));
    }

    public function create()
    {
        return view('admin.pengirim.create');
    }

    public function store(StorePengirimRequest $request)
    {
        DB::table('senders')->insert($request->validated());

        return redirect()->route('pengirim.index')->with('message', 'Pengirim berhasil ditambahkan.');
    }

    public function edit(int $pengirim)
    {
        return view('admin.pengirim.edit', ['pengirim' =>  DB::table('senders')->where('id', $pengirim)->first()]);
    }

    public function update(UpdatePengirimRequest $request, int $pengirim)
    {
        DB::table('senders')->where('id', $pengirim)->update($request->validated());

        return redirect()->route('pengirim.index')->with('message', 'Pengirim berhasil diedit.');
    }

    public function destroy(int $pengirim)
    {
        DB::table('senders')->where('id', $pengirim)->delete();

        return response()->json(['status' => 200, 'message' => 'Pengirim berhasil dihapus.']);
    }
}
