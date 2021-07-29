<?php declare(strict_types=1);


namespace App\Services;


use App\Contracts\Social;
use Exception;
use Laravel\Socialite\Contracts\User;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;

class SocialService implements Social
{
    public function userInit(User $user): bool
    {
        $userData = ModelsUser::where([
            'email' => $user->getEmail()
        ])->first();

        if ($userData) {
            //auth user
            $userData->name = $user->getName();
            $userData->avatar = $user->getAvatar();

            if ($userData->save()) {
                Auth::loginUsingId($userData->id);
                return true;
            }
        } /*else {
            //register
        }*/

        throw new Exception('Не удалось сохранить пользователя');
    }
}
