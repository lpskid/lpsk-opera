<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|unique:regulations,title',
            'content' => 'required',
            'attachments.*' => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation = new Regulation();
        $regulation->title = $request->title;
        $regulation->slug = \Str::slug($request->title . '-' . \Str::random(6));
        $regulation->jdih_link = $request->jdih_link;
        $regulation->content = $request->content;
        $regulation->information = $request->information ?? null;

        if ($request->status == 'pengusulan') {
            $regulation->status = 'pending';
        } else {
            $regulation->status = 'penetapan';
        }

        $regulation->date = date('Y-m-d');
        $regulation->save();



        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public'); // Simpan file di folder 'attachments'

                // Simpan informasi lampiran di database
                $regulation->attachments()->create([
                    'regulation_status' => $request->status,
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }

        if ($request->status == 'pengusulan') {
            return redirect()->route('peraturan.index', ['type' => 'pending'])->with('success', 'Peraturan berhasil dibuat.');
        }
        return redirect()->route('peraturan.index', ['type' => 'penetapan'])->with('success', 'Peraturan berhasil dibuat.');
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
            'title' => 'required|unique:regulations,title,' . $id,
            'content' => 'required',
            'attachments.*' => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

        $regulation->update([
            'title' => $request->title,
            'jdih_link' => $request->jdih_link,
            'content' => $request->content,
            'information' => $request->information ?? null,
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

    public function updateApprove(Request $request, string $id)
    {
        $regulation = Regulation::find($id);

        $regulation->update([
            'status' => 'pengusulan',
        ]);


        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $regulation = Regulation::find($id);
        foreach ($regulation->attachments as $attachment) {
            if (\Storage::disk('public')->exists($attachment->path)) {
                \Storage::disk('public')->delete($attachment->path);
            }
            $attachment->delete();
        }

        $regulation->delete();

        return redirect()->route('peraturan.index')->with('success', 'Peraturan berhasil dihapus.');
    }

    public function updateStatus(Request $request, string $id)
    {
        $regulation = Regulation::find($id);

        $request->validate([
            'attachments.*' => 'sometimes|mimes:pdf,doc,docx|max:20000',
        ]);

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

        $request_status = $request->status;

           $cekRegulationStatus = Regulation::where('id', $id)
            ->whereHas('attachments', function ($q) use ($request_status) {
                $q->where('regulation_status', $request_status);
            })
            ->count();

        if ($cekRegulationStatus == 0) {

         if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('attachments', 'public'); // Simpan file di folder 'attachments' pada disk 'public'

                    // Simpan informasi lampiran di database
                    $regulation->attachments()->create([
                        'regulation_status' => $request->status,
                        'name' => $file->getClientOriginalName(),
                        'path' => $path,
                    ]);
                }
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Lampiran sudah ada untuk status ini.'], 400);

        }


        if (in_array($request->status, $statusOptions)) {
            $regulation->status = $request->status;
            $regulation->save();




            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    /**
     * Check if a regulation has attachments.
     * Returns JSON: { status: 1 } if attachments exist, { status: 0 } otherwise.
     */
    public function cekRegulationStatusAttachment($id, $status)
    {

        $cekRegulationStatus = Regulation::where('id', $id)
            ->whereHas('attachments', function ($q) use ($status) {
                $q->where('regulation_status', $status);
            })
            ->count();

            if ($cekRegulationStatus > 0) {
                $status = 1; // Ada lampiran
            } else {
                $status = 0; // Tidak ada lampiran
            }




        return response()->json(['status' => $status]);
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
