<?php

namespace App\Http\Controllers\onlineVendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
      $data =  $request->validate([
            'fullname' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            // 'email' =>    'required |email|max:255|unique:admins,email,'.Auth::guard('admin')->user()->id,
            'email' => ['required','email' ,'unique:vendors', 'max:255'],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:vendors,phone,',
            // 'phone' => ['required','email' ,'unique:vendors', 'max:255'],
            'confirm-password' => 'required|same:password',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],

        ]);

       $vendor = Vendor::create([
            'fullname'=> $request->fullname,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'password'=> bcrypt($request->password),
            'country_of_residence'=> 'ghana',
            // 'social_media_profile_url'=> '',
            'social_media'=> '',
            'avatar'=> '',
            'status'=>0,
        ]);

        Auth::login($vendor);

        return redirect()->route('vendor.dashboard')->with('flush_messsage', 'Welcome to Yaadda');

    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vendor.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
