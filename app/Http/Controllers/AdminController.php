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
        
        $rate = Guestbook::avg('kep');
        
        // $diff = Carbon::parse(Guestbook::get('created_at'))->diffInHours(Carbon::parse(Guestbook::get('jamkeluar')));
        $ntamu = count(Guestbook::where('status',1)->get('jammasuk'));
        if ($ntamu == 0) {
            $diffjam = 0;
            $diffmenit = 0; 
        } else {
        $diff = 0;
        for( $i=0; $i<=$ntamu; $i++){
            $cc = Guestbook::where('status',1)->skip($i)->take(1)->select('jammasuk')->value('jammasuk');
            $gg = Guestbook::where('status',1)->skip($i)->take(1)->select('jamkeluar')->value('jamkeluar');
            $diff = (strtotime($gg)-strtotime($cc))/60 + $diff;
        }
        $diffjam = ($diff/60)/$ntamu;
        $diffmenit = ($diff%60)/$ntamu;
        }
        // $diff = $go - $come;
        return view('admin.index', [
            'gb_users' => User::all(),
            'gb_guestbooks' => Guestbook::all(),
            'gb_kepuasans' => Kepuasan::all(),
            'barchart' => $barchart,
            'barchart1' => $barchart1,
            'rate' => round($rate,1),
            'diffjam' => floor($diffjam),
            'diffmenit' => round($diffmenit),
            'ntamu' => $ntamu
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
                    $validatedData = $request->only('name', 'username', 'role', 'email');

                    User::where('id', $id)->update(['name' => $request->name, 'username' => $request->username,'role' => $request->role, 'email' => $request->email]);
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
            'role'  => ['required'],
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min: 3', 'max: 255'] 
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Your account has been registered. Please login.');
        
        return redirect('/admin?d=register');
    }

    public function defaultCheckout(Request $request)
    {
        return view('admin.checkoutall');
    }


    public function autocheckout(Request $request)
{
        $validatedData = $request->only('jamkeluar', 'status',  'message');
        Guestbook::where('status',0)->update(['jamkeluar' => "16:00", 'status' => 2, 'message' => "Auto Checkout"]);
        return redirect('/admin?d=guestbooks');
}
}



