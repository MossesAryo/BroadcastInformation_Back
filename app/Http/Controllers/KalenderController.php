<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        return view('Panel.kalender.kalender', [
            informasi::get()
        ]);
    }

    public function fetchEvents()
    {
        $events = Informasi::select(
            'IDInformasi as id',
            'Judul as title',
            'TanggalMulai as start',
            'TanggalSelesai as end'
        )->get();

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'TanggalMulai' => 'required|date',
            'TanggalSelesai' => 'required|date|after_or_equal:TanggalMulai'
        ]);

        $event = Informasi::create([
            'IDOperator' => 1, // Sementara default
            'IDKategoriInformasi' => 1,
            'Judul' => $request->Judul,
            'Deskripsi' => '-',
            'Thumbnail' => '-',
            'TanggalMulai' => $request->TanggalMulai,
            'TanggalSelesai' => $request->TanggalSelesai,
            'TargetDepartemen' => 'Umum'
        ]);

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Informasi::find($id);
        if (!$event) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $event->delete();
        return response()->json(['message' => 'Event deleted']);
    }
}
