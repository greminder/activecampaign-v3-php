<?php

namespace Mediatoolkit\ActiveCampaign\Accounts;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Accounts
 * @package Mediatoolkit\ActiveCampaign\Accounts
 * @see https://developers.activecampaign.com/reference/create-an-account-new
 */
class Accounts extends Resource
{

    /**
     * Create an organization
     * @see https://developers.activecampaign.com/reference#create-organization
     *
     * @param array $organization
     * @return string
     */
    public function create(array $organization)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/accounts', [
                'json' => [
                    'account' => $organization
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get an organization
     * @see https://developers.activecampaign.com/reference#get-organization
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/accounts/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Update an organization
     * @see https://developers.activecampaign.com/reference#update-organization
     *
     * @param int $id
     * @param array $organization
     * @return string
     */
    public function update(int $id, array $organization)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/accounts/' . $id, [
                'json' => [
                    'account' => $organization
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete an organization
     * @see https://developers.activecampaign.com/reference#delete-organization
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/accounts/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Delete multiple accounts
     * @see https://developers.activecampaign.com/reference#delete-multiple-accounts
     *
     * @param array $ids
     * @return string
     */
    public function bulkDelete(array $ids)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/accounts/bulk_delete', [
                'query' => [
                    'ids' => $ids
                ]
            ]);

        return $req->getBody()->getContents();
    }

    public function listAll(array $query_params = [], $limit = 20, $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/accounts', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * List all notes from account
     *
     * @param int $id
     * @return string
     */
    public function listNotes(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/accounts/' . $id . '/notes');

        return $req->getBody()->getContents();
    }

}