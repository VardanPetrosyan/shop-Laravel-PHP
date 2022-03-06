<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {

        $account = User::whereProvaider('facebook')
            ->whereProvaiderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                    'provaider_user_id' => $providerUser->getId(),
                    'provaider' => 'facebook',
                    'avatar' => $providerUser->avatar
                ]);
                $user->makeEmployee("client",'true');
            }

            return $user;
        }
    }
}
