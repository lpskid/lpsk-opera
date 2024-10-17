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

        return view('pages.landing.index', compact('regulations', 'search'));
    }

    public function evaluation()
    {
        $regulations = Regulation::all();
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
            'captcha' => 'required|captcha',
        ], [
            'captcha.captcha' => 'Captcha tidak sesuai',
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
        ]);

        return redirect()->back()->with('success', 'Terima kasih, kami akan segera menghubungi anda.');
    }

    public function evaluationDetail(string $slug)
    {
        $regulation = Regulation::with('evaluations')->where('slug', $slug)->first();
        return view('pages.landing.evaluation-detail', compact('regulation'));
    }

    public function regulation()
    {
        $regulations = Regulation::all();
        return view('pages.landing.regulation', compact('regulations'));
    }

    public function publicParticipation()
    {
        $regulations = Regulation::all();

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
            'captcha' => 'required|captcha',
        ], [
            'captcha.captcha' => 'Captcha tidak sesuai',
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
        ]);

        return redirect()->back()->with('success', 'Terima kasih, kami akan segera menghubungi anda.');
    }

    public function publicParticipationDetail(string $slug)
    {
        $regulation = Regulation::with('publicParticipations')->where('slug', $slug)->first();

        return view('pages.landing.public-participation-detail', compact('regulation'));
    }
}