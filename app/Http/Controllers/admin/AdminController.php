<?php

namespace App\Http\Controllers\admin;

use Auth;
use Hash;
use App\Models\Admin;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function adminAuthenticate(Request $request)
    {

        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$inputVal['email'],'password'=>$request['password'],'status'=>1])) {

            return redirect()->route('admin.dashboard')->with('flush_message', 'Welcome to  Admin Dashboard ');

            
        }
        else{
            return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid Credentials']);

        } 
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


    public function settingsPage()
    {
        return view('admin.settings');
    }

    public function checkAdminPassword( Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['currentPassword'],Auth::guard('admin')->user()->password)) {
            
            return "true";
        }
        else {
            return "false";
        }

    }

    public function updateAdminPassword(Request $request)
    {   

        $data = $request->all();

        $request->validate([
            'currentPassword' =>['required'],
            'confirmPassword' => 'required|same:newPassword',
            'newPassword' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],

        ]);

        // check if current password is correct 

        if (Hash::check($data['currentPassword'], Auth::guard('admin')->user()->password)) {
            
            if ($data['currentPassword'] != $data['newPassword']) {

          // chcek if new password and current password matches

                if ($data['confirmPassword'] == $data['newPassword']) {

                    Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=> bcrypt($data['newPassword']),
                    ]);
                    
                    return redirect()->back()->with('flush_message', 'Password Update successfull');

                    
                }
                else {
                    return back()->withErrors(['confirmPassword' => 'Passwords do not match, please Check', 'newPassword' => 'Passwords do not match, please Check']);

                }
            }
            elseif ($data['currentPassword'] == $data['newPassword']) {
                return back()->withErrors(['currentPassword' => 'Passwords do not', 'newPassword' => 'Passwords do not']);
            }
        }
        else {
            return back()->with('error-flashMessage', 'Current Password Is Incorrect');
        }
        
    }


    public function updateAdminProfile( Request $request)
    {
        
        $request->validate([
            // 'avatar' => ['required','image', 'mimes:jpg,png,jpeg'],
            'avatar'=>'sometimes | image | mimes:jpg,png,jpeg,'.Auth::guard('admin')->user()->id,
            'userFullname' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'userEmail' =>    'required |email |unique:admins,email,'.Auth::guard('admin')->user()->id,
            'userContact' => 'required|regex:/^[0-9]{9,10}$/|unique:admins,phone,'.Auth::guard('admin')->user()->id,
         ]);

         $avatar = $request->avatar;

         if ($avatar != null) {
             $avataName = time() . '-' . $request->fullname . '.' . $avatar->extension();
 
             $avatar_path = $avatar->move('images', $avataName);
         }


        Admin::where('id', Auth::guard('admin')->user()->id)->update(
            [
                'name' => $request->userFullname,
                'phone' => $request->userContact,
                'avatar' => $avatar_path ?? Auth::guard('admin')->user()->avatar,
            ]
        );

        return redirect(route('admin.settingsPage'))->with('flush_message', 'profile has been updated successfully!!');

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
