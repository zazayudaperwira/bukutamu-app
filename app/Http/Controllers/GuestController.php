<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function defaultGuest()
    {
        return view('guestbook.index');
    }

    public function send(Request $request)
    {
        // $folderPath =storage_path('/app/public');
        $folderPath = public_path('/images/ttd/ttd1');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = 'png';
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'instansi' => ['required', 'max:255'],
            'jumlah' => ['required'],
            'tujuan' => ['required', 'max:255'],
            'keperluan' => ['required', 'max:255'],
            'email' => ['max:255', 'email:dns'],
            'jamkeluar' => ['nullable', 'max:255'],
            'phone' => ['required', 'max:255', 'min:2'],
            'sign' => ['required'],
        ]);

        Guestbook::create([
            'name' => $request->name,
            'address' => $request->address,
            'instansi' => $request->instansi,
            'tujuan' => $request->tujuan,
            'jumlah' => $request->jumlah,
            'keperluan' => $request->keperluan,
            'jamkeluar' => $request->jamkeluar,
            'email' => $request->email,
            'phone' => $request->phone,
            'sign' => $file
        ]);

        $request->session()->flash('sent', 'Terima kasih telah mengisi buku tamu, silahkan menuju ke Meja Frontliner');
        return redirect('/');
    }
}
