<?php

namespace App\SsoProvider;

use Laravel\Socialite\Two\AbstractProvider;

class TolleWebsiteProvider extends AbstractProvider
{

    protected function getAuthUrl($state)
    {
        return 'http://tollerprovider.de/ssologin';
    }

    protected function getTokenUrl()
    {

    }

    protected function getUserByToken($token)
    {
        // TODO: Implement getUserByToken() method.
    }

    protected function mapUserToObject(array $user)
    {
        // TODO: Implement mapUserToObject() method.
    }
}
