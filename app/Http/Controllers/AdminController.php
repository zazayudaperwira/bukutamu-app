<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guestbook;
use App\Models\Kepuasan;
use Auth;
use Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    // harus login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function defaultAdmin()
    {
        $month = Carbon::now()->format('m');
        $year  = Carbon::now()->format('Y');

        $barchart = [];
        for($i=1; $i<=12; $i++){
            $barchart[$i] = Guestbook::whereMonth('created_at',$i)->whereYear('created_at',$year)->count();
        }

        $barchart1 = [];
        for($i=0; $i<=4; $i++){
            $barchart1[$i] = Guestbook::whereRaw('WEEKDAY(created_at)='.$i)->whereMonth('created_at',$month)->whereYear('created_at',$year)->count();
        }

        return view('admin.index', [
            'gb_users' => User::all(),
            'gb_guestbooks' => Guestbook::all(),
            'gb_kepuasans' => Kepuasan::all(),
            'barchart' => $barchart,
            'barchart1' => $barchart1,
        ]);
    }

    public function delete(Request $request)
    {
        if ($request->has(['delete', 'd'])) {
            $id = $request->delete;

            switch ($request->d) {
                case ('users'):
                    User::destroy($id);
                case ('guestbooks'):
                    Guestbook::destroy($id);
            }
        } else {
            return redirect()->back();
        }

        return redirect('/admin?d=' . $request->d . '');
    }

    public function defaultUpdate(Request $request)
    {
        return view('admin.update', [
            'update' => $request->update,
            'd' => $request->d
        ]);
    }

    public function update(Request $request)
    {
        if ($request->has(['update', 'd'])){
            $id = $request->update;

            switch ($request->d) {
                case ('users'):
                    $validatedData = $request->only('name', 'username', 'email');

                    User::where('id', $id)->update(['name' => $request->name, 'username' => $request->username, 'email' => $request->email]);
                    return redirect('/admin?d=' . $request->d . '');
                    
                case ('guestbooks'):
                    $validatedData = $request->only('name', 'address', 'instansi', 'tujuan', 'keperluan', 'status', 'jamkeluar', 'email', 'phone', 'message');

                    Guestbook::where('id', $id)->update(['name' => $request->name, 'status' => $request->status, 'address' => $request->address, 'instansi' => $request->instansi, 'tujuan' => $request->tujuan, 'keperluan' => $request->keperluan,  'jamkeluar' => $request->jamkeluar, 'email' => $request->email, 'phone' => $request->phone, 'message' => $request->message]);
                    return redirect('/admin?d=' . $request->d . '');
            }
        }else{
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min: 3', 'max: 255'] 
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Your account has been registered. Please login.');
        
        return redirect('/admin?d=register');
    }
}
