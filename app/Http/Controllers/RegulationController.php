<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = null)
    {
        $query = Regulation::query();

        if ($type) {
            $query->where('status', $type);
        }

        $regulations = $query->get();
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
            'information'   => 'required',
            'attachments.*'     => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation = Regulation::create([
            'title'          => $request->title,
            'slug'          => \Str::slug($request->title . '-' . \Str::random(6)),
            'jdih_link' => $request->jdih_link,
            'content'       => $request->content ?? null,
            'information'   => $request->information,
            'status'        => $request->status,
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

        if ($request->status == 'pengusulan') {
            return redirect()->route('peraturan.index', ['type' => 'pengusulan'])->with('success', 'Peraturan berhasil dibuat.');
        }
        return redirect()->route('peraturan.index', ['type' => 'perencanaan'])->with('success', 'Peraturan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $regulation = Regulation::with(['evaluations', 'publicParticipations'])->find($id);

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
            'information'   => 'required',
            'attachments.*'     => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation->update([
            'title'          => $request->title,
            'jdih_link' => $request->jdih_link,
            'content'       => $request->content ?? null,
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

    public function updateStatus(Request $request, string $id)
    {
        $regulation = Regulation::find($id);

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
            'analisa_evaluasi'
        ];

        if (in_array($request->status, $statusOptions)) {
            $regulation->status = $request->status;
            $regulation->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}

//     public function updateStatus(string $id)
//     {
//         $regulation = Regulation::find($id);

//         // Array status yang tersedia
//         $statusOptions = [
//             'pengusulan',
//             'penyusunan_pembahasan',
//             'partisipasi_publik',
//             'persetujuan_pimpinan',
//             'penyelarasan',
//             'penetapan',
//             'pengundangan_peraturan',
//             'penyusunan_informasi',
//             'penyebarluasan',
//             'laporan_proses',
//             'analisa_evaluasi',
//         ];

//         // Cari posisi status saat ini di dalam array status
//         $currentStatusIndex = array_search($regulation->status, $statusOptions);

//         // Jika status saat ini tidak ditemukan atau sudah di akhir, tidak bisa lanjut
//         if ($currentStatusIndex === false || $currentStatusIndex == count($statusOptions) - 1) {
//             return redirect()->back()->with('error', 'Status tidak dapat diperbarui lebih lanjut');
//         }

//         // Update ke status berikutnya
//         $regulation->status = $statusOptions[$currentStatusIndex + 1];
//         $regulation->save();

//         return redirect()->back()->with('success', 'Status berhasil diperbarui');
//     }
// }