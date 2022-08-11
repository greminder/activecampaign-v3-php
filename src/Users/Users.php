<?php

namespace Mediatoolkit\ActiveCampaign\Users;

use Mediatoolkit\ActiveCampaign\Resource;

class Users extends Resource
{
    /**
     * Retrieve a user by username
     *
     * @param string $username
     * @return string
     */
    public function retrieveByUsername(string $username): string
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/users/username/' . $username);

        return $req->getBody()->getContents();
    }
}