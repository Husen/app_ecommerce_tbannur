<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class LoginWithGoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('email', $user->email)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('user/profil/'.$finduser->id);
       
            }else{
                $newUser = User::create([
                    'nama_user' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make($user->name),
                ]);

      
                Auth::login($newUser);
                return redirect()->intended('user/profil/'.$newUser->id)->with('toast_success', 'Login Sukses, Password default sesuai dengan username email anda, silahkan ubah :)');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
