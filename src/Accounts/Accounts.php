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
     * Create an account
     * @see https://developers.activecampaign.com/reference#create-account
     *
     * @param array $account
     * @return string
     */
    public function create(array $account)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/accounts', [
                'json' => [
                    'account' => $account
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get an account
     * @see https://developers.activecampaign.com/reference#get-account
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
     * Update an account
     * @see https://developers.activecampaign.com/reference#update-account
     *
     * @param int $id
     * @param array $account
     * @return string
     */
    public function update(int $id, array $account)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/accounts/' . $id, [
                'json' => [
                    'account' => $account
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete an account
     * @see https://developers.activecampaign.com/reference#delete-account
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