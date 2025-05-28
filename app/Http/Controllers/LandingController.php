<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\PublicParticipation;
use App\Models\Regulation;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Get the search keyword from the request
        $search = $request->input('search');

        // Initialize an empty collection for regulations
        $regulations = collect();

        // Query regulations based on the search keyword
        if ($search) {
            $regulations = Regulation::where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        }

        $fix_regulations = Regulation::where('status', ['analisa_evaluasi'])->latest()->take(8)->get();

        $newest_regulations = Regulation::latest()->take(8)->get();

        // Array of background images
        $backgroundImages = [
            asset('images/landing/bg-landing-hukum-1.jpg'),
            asset('images/landing/bg-landing-hukum-2.jpg'),
            asset('images/landing/bg-landing-hukum-3.jpg'),
            asset('images/landing/bg-landing-hukum-4.jpg'),
            asset('images/landing/bg-landing-hukum-5.jpg'),
            asset('images/landing/bg-landing-hukum-6.jpg'),
            asset('images/landing/bg-landing-hukum-7.jpg'),
            asset('images/landing/bg-landing-hukum-8.jpg'),
        ];

        // Shuffle images array and slice the first 8 images
        shuffle($backgroundImages);
        $backgroundImages = array_slice($backgroundImages, 0, 8);


        // Array of background images
        $backgroundImagesTwo = [
            asset('images/landing/bg-landing-hukum-1.jpg'),
            asset('images/landing/bg-landing-hukum-2.jpg'),
            asset('images/landing/bg-landing-hukum-3.jpg'),
            asset('images/landing/bg-landing-hukum-4.jpg'),
            asset('images/landing/bg-landing-hukum-5.jpg'),
            asset('images/landing/bg-landing-hukum-6.jpg'),
            asset('images/landing/bg-landing-hukum-7.jpg'),
            asset('images/landing/bg-landing-hukum-8.jpg'),
        ];

        // Shuffle images array and slice the first 8 images
        shuffle($backgroundImagesTwo);
        $backgroundImagesTwo = array_slice($backgroundImagesTwo, 0, 8);

        $participant_public = PublicParticipation::count();
        $participant_evaluation = Evaluation::count();

        $new_regulations = Regulation::where('status', ['pengusulan', 'penyusunan_pembahasan', 'partisipasi_publik'])->count();
        $fixed_regulations = Regulation::where('status', ['pengundangan_peraturan', 'penyusunan_informasi', 'penyebarluasan', 'laporan_proses', 'analisa_evaluasi'])->count();

        return view('pages.landing.index', compact('regulations', 'search', 'newest_regulations', 'backgroundImages', 'fix_regulations', 'backgroundImagesTwo', 'participant_public', 'participant_evaluation', 'new_regulations', 'fixed_regulations'));
    }

    public function evaluation()
    {
        $regulations = Regulation::where('status', 'analisa_evaluasi')->get();
        return view('pages.landing.evaluation', compact('regulations'));
    }

    public function evaluationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:evaluations',
            'status' => 'required',
            'phone' => 'required|numeric|unique:evaluations',
            'age' => 'required',
            'gender' => 'required',
            'content' => 'required',
            // 'captcha' => 'required|captcha',
        ]);

        Evaluation::create([
            'regulation_id' => $request->regulation_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'age' => $request->age,
            'gender' => $request->gender,
            'content' => $request->content,
            'company' => $request->company ?? null,
        ]);

        return redirect()->back()->with('success', 'Terima kasih, kami akan segera menghubungi anda.');
    }

    public function evaluationDetail(string $slug)
    {
        $regulation = Regulation::with('evaluations')->where('slug', $slug)->firstOrFail();

        $sessionKey = 'viewed_regulation_' . $regulation->id;

        // Cek apakah regulation ini sudah dilihat dalam session
        if (!session()->has($sessionKey)) {
            $regulation->increment('total_views');
            session()->put($sessionKey, true);
        }

        return view('pages.landing.evaluation-detail', compact('regulation'));
    }


    public function regulation()
    {
        // $regulations = Regulation::where('status', ['pengusulan', 'penyusunan_pembahasan', 'persetujuan_pimpinan', 'partisipasi_publik', 'penyelarasan'])->get();
        $regulations = Regulation::all();
        return view('pages.landing.regulation', compact('regulations'));
    }

    public function regulationDetail(string $slug)
    {
        $regulation = Regulation::where('slug', $slug)->first();

        $sessionKey = 'viewed_regulation_' . $regulation->id;

        // Cek apakah regulation ini sudah dilihat dalam session
        if (!session()->has($sessionKey)) {
            $regulation->increment('total_views');
            session()->put($sessionKey, true);
        }

        return view('pages.landing.regulation-detail', compact('regulation'));
    }

    public function publicParticipation()
    {
        $regulations = Regulation::where('status', 'partisipasi_publik')->get();

        return view('pages.landing.public-participation', compact('regulations'));
    }

    public function publicParticipationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:public_participations',
            'phone' => 'required|numeric|unique:public_participations',
            'content' => 'required',
            'status' => 'required',
            'age' => 'required',
            // 'captcha' => 'required|captcha',
        ]);

        PublicParticipation::create([
            'regulation_id' => $request->regulation_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'age' => $request->age,
            'gender' => $request->gender,
            'content' => $request->content,
            'company' => $request->company ?? null,
        ]);

        return redirect()->back()->with('success', 'Terima kasih, kami akan segera menghubungi anda.');
    }

    public function publicParticipationDetail(string $slug)
    {
        $regulation = Regulation::with('publicParticipations')->where('slug', $slug)->first();

        $regulation = Regulation::where('slug', $slug)->first();

        $sessionKey = 'viewed_regulation_' . $regulation->id;

        // Cek apakah regulation ini sudah dilihat dalam session
        if (!session()->has($sessionKey)) {
            $regulation->increment('total_views');
            session()->put($sessionKey, true);
        }

        return view('pages.landing.public-participation-detail', compact('regulation'));
    }
}