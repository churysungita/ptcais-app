<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        return view('auth.login');
    }


    public function create()
    {
        //
    }


    public function store(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $role = DB::table('users')->where('email', $request->email)->value('role');
        //$hashed = DB::table('users')->where('password',$request->password);

        switch ($role){
            case 'admin':
                if (Auth::attempt($credentials)){
                    $request ->session()->regenerate();
                    return redirect()->intended('admin_dashboard');
                }

                return back()->withErrors([
                    'email' => 'The provided credential do not match our record'
                ])->onlyInput('email');

            case 'head_teacher':
                if (Auth::attempt($credentials)){
                    $request ->session()->regenerate();
                    return redirect()->intended('head_teacher');
                }

                return back()->withErrors([
                    'email' => 'The provided credential do not match our record'
                ])->onlyInput('email');

            case 'deo':

                if (Auth::attempt($credentials)){
                    $request ->session()->regenerate();
                    return redirect()->intended('deo_dashboard');
                }

                return back()->withErrors([
                    'email' => 'The provided credential do not match our record'
                ])->onlyInput('email');
                //return redirect('dashboard');


            case 'teacher':

                if (Auth::attempt($credentials)){
                    $request ->session()->regenerate();
                    return redirect()->intended('teacher');
                }

                return back()->withErrors([
                    'email' => 'The provided credential do not match our record'
                ])->onlyInput('email');
                //return redirect('teacher');

            case 'pupil':
                if (Auth::attempt($credentials)){
                    $request ->session()->regenerate();
                    return redirect()->intended('pupil_dashboard');
                }

                return back()->withErrors([
                    'email' => 'The provided credential do not match our record'
                ])->onlyInput('email');

                //return redirect('pupil_dashboard/'.$userId);

            default:
                return redirect('/')->with('error','Invalid credentials');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
