<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\CreateTeam;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->stateless()->user();

        return $this->socialLoginOrRegister($user->email, $user->name);
    }

    private function socialLoginOrRegister($email, $name)
    {
        $user = User::where('email', $email)->first();

        if ($user === null) {
            $user = new User([
                'email' => $email,
                'name' => $name,
                'password' => \Hash::make(md5(rand())),
            ]);

            $user->save();

            (new CreateTeam())->create($user, ['name' => $user->name . ' Team', 'personal_team' => true]);
        }

        \Auth::login($user);
        return redirect('scriptorium');
    }
}
