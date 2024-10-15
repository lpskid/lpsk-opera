<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
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
            'regulation_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:evaluations',
            'status' => 'required',
            'phone' => 'required|numeric|unique:evaluations',
            'age' => 'required',
            'gender' => 'required',
            'content' => 'required',
            'captcha' => 'required|captcha',
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
}
