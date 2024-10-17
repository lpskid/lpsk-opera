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
            'number'         => 'required|unique:regulations,number',
            'jdih_link' => 'required',
            'content'   => 'required',
            'information'   => 'required',
            'attachments.*'     => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation = Regulation::create([
            'number'          => $request->number,
            'title'          => $request->title,
            'slug'          => \Str::slug($request->title . '-' . \Str::random(6)),
            'jdih_link' => $request->jdih_link,
            'content'       => $request->content,
            'information'   => $request->information,
            'status'        => 'pengusulan',
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public'); // Simpan file di folder 'attachments'

                // Simpan informasi lampiran di database
                $regulation->attachments()->create([
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }


        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil dibuat.');
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
        $regulation = Regulation::find($id);

        $request->validate([
            'title'          => 'required|unique:regulations,title,' . $id,
            'number'         => 'required|unique:regulations,number,' . $id,
            'jdih_link' => 'required',
            'content'   => 'required',
            'information'   => 'required',
            'attachments.*'     => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation->update([
            'number'          => $request->number,
            'title'          => $request->title,
            'jdih_link' => $request->jdih_link,
            'content'       => $request->content,
            'information'   => $request->information,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments'); 
                // Simpan file di folder 'attachments'

                // Simpan informasi lampiran di database
                $regulation->attachments()->create([
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $regulation = Regulation::find($id);

        $regulation->delete();

        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil dihapus.');
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