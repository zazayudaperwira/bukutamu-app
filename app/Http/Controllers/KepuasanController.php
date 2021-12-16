<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepuasan;

class KepuasanController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function defaultKepuasan()
    {
        return view('index');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'tingkatkepuasan' => ['required', 'max:255'],
            'feedback' => ['nullable', 'min:4'],
        ]);

        Kepuasan::create($data);

        $request->session()->flash('sent', 'Terima kasih telah mengisi Survey Kepuasan, Kami akan selalu berusaha meningkatkan pelayanan di BPS Provinsi Lampung');
        return redirect('/tamu/update');
    }
}
