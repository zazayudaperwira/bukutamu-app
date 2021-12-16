<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medias;
use App\Models\Guestbook;
use App\Models\Kepuasan;
use Auth;
use Session;

class AdminController extends Controller
{

    // public function index(){
    //     if(!Session::get('login')){
    //         return redirect('login')->with('alert','Kamu harus login dulu');
    //     }
    //     else{
    //         return view('user');
    //     }
    // }

    // Harus Login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(){
        return view('auth.login');
    }

    public function defaultAdmin()
    {
        return view('admin.index', [
            // 'title' => 'Administration Center',
            'gb_users' => User::all(),
            // 'gb_medias' => Medias::all(),
            'gb_guestbooks' => Guestbook::all(),
            'gb_kepuasans' => Kepuasan::all()
        ]);
    }

    public function delete(Request $request)
    {
//        return $request->all();

        if ($request->has(['delete', 'd'])) {
            $id = $request->delete;

            switch ($request->d)
            {
                case('users'):
                    User::destroy($id);
                case('guestbooks'):
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
            // 'title' => 'Edit Menu',
            'update' => $request->update,
            'd' => $request->d
        ]);
    }

    public function update(Request $request)
    {
        if ($request->has(['update', 'd'])) {
            $id = $request->update;

            switch ($request->d)
            {
                case('users'):
                    $validatedData = $request->only('name', 'username', 'email');

                    User::where('id', $id)->update(['name' => $request->name, 'username' => $request->username, 'email' => $request->email]);
                    return redirect('/admin?d=' . $request->d . '');
                // case('medias'):
                //     $validatedData = $request->only('category_id', 'media_title');

                //     Medias::where('id', $id)->update(['category_id' => $request->category_id, 'media_title' => $request->media_title]);
                //     return redirect('/admin?d=' . $request->d . '');
                case('guestbooks'):
                    $validatedData = $request->only('name','address','instansi','tujuan','keperluan','status','jamkeluar', 'email', 'phone', 'message');

                    Guestbook::where('id', $id)->update(['name' => $request->name,'status' => $request->status,'address' => $request->address,'instansi' => $request->instansi,'tujuan' => $request->tujuan,'keperluan' => $request->keperluan,  'jamkeluar' => $request->jamkeluar, 'email' => $request->email, 'phone' => $request->phone, 'message' => $request->message ]);
                    return redirect('/admin?d=' . $request->d . '');
            }
        } else {
            return redirect()->back();
        }

//        return redirect('/admin?d=' . $request->d . '');
    }

    
}
