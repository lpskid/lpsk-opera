<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regulations = Regulation::all();
        return view('pages.dashboard.regulation.index', compact('regulations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.regulation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|unique:regulations,title',
            'invitation_date' => 'required',
            'content'   => 'required',
        ]);

        Regulation::create([
            'title'          => $request->title,
            'invitation_date' => $request->invitation_date,
            'content'       => $request->content,
            'status'        => 'pengusulan',
        ]);

        return redirect()->route('peraturan.index')->with('success', 'Regulasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $regulation = Regulation::with(['evaluations'])->find($id);

        return view('pages.dashboard.regulation.show', compact('regulation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $regulation = Regulation::find($id);

        return view('pages.dashboard.regulation.edit', compact('regulation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $regulation = Regulation::find($id);

        $regulation->delete();

        return redirect()->route('peraturan.index')->with('success', 'Regulasi berhasil dihapus.');
    }

    public function updateStatus(string $id)
    {
        $regulation = Regulation::find($id);

        // Array status yang tersedia
        $statusOptions = [
            'pengusulan',
            'penyusunan_pembahasan',
            'partisipasi_publik',
            'persetujuan_pimpinan',
            'penyelarasan',
            'penetapan',
            'pengundangan_peraturan',
            'penyusunan_informasi',
            'penyebarluasan',
            'laporan_proses',
            'analisa_evaluasi',
        ];

        // Cari posisi status saat ini di dalam array status
        $currentStatusIndex = array_search($regulation->status, $statusOptions);

        // Jika status saat ini tidak ditemukan atau sudah di akhir, tidak bisa lanjut
        if ($currentStatusIndex === false || $currentStatusIndex == count($statusOptions) - 1) {
            return redirect()->back()->with('error', 'Status tidak dapat diperbarui lebih lanjut');
        }

        // Update ke status berikutnya
        $regulation->status = $statusOptions[$currentStatusIndex + 1];
        $regulation->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
