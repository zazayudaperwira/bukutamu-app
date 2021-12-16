<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medias;
use App\Models\Guestbook;
use App\Models\Kepuasan;

class TamuController extends Controller
{
    public function defaultTamu()
    {
        return view('tamu.index', [
            // 'title' => 'Daftar Tamu',
            'gb_users' => User::all(),
            'gb_guestbooks' => Guestbook::where('status',0)->get(),
            'gb_kepuasans'   => Kepuasan::all()
        ]);
    }

    public function defaultUpdate(Request $request)
    {
        return view('tamu.update', [
            // 'title' => 'Checkout Tamu',
            'update' => $request->update,
            'd' => $request->d
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'tingkatkepuasan' => ['required', 'max:255'],
            'feedback' => ['nullable', 'min:1'],
        ]);

        Kepuasan::create($data);

        $request->session()->flash('sent', 'Terima kasih telah mengisi Survey Kepuasan, Kami akan selalu berusaha meningkatkan pelayanan di BPS Provinsi Lampung');

        if ($request->has(['update', 'd'])) {
            $id = $request->update;

            switch ($request->d)
            {
                case('users'):
                    $validatedData = $request->only('name', 'username', 'email');

                    User::where('id', $id)->update(['name' => $request->name, 'username' => $request->username, 'email' => $request->email]);
                    return redirect('/admin?d=' . $request->d . '');
                case('guestbooks'):
                    $validatedData = $request->only('jamkeluar','status');

                    Guestbook::where('id', $id)->update(['jamkeluar' => date("H:i:s"),'status'=>1]);
                    return redirect('/');
            }
        } else {
            return redirect()->back();
        }
            return redirect('/');
    }
}
