<?php

namespace Mediatoolkit\ActiveCampaign\TaskTypes;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Tasks
 * @package Mediatoolkit\ActiveCampaign\TaskTypes
 * @see https://developers.activecampaign.com/reference/create-a-deal-task-type
 */
class TaskTypes extends Resource
{

    /**
     * Create a taskType
     * @see https://developers.activecampaign.com/reference/create-a-deal-task-type
     *
     * @param array $taskType
     * @return string
     */
    public function create(array $taskType)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/dealTasktypes', [
                'json' => [
                    'dealTasktype' => $taskType
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get task
     * @see https://developers.activecampaign.com/reference/retrieve-a-deal-task-type
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealTasktypes/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Update a taskType
     * @see https://developers.activecampaign.com/reference/update-a-deal-task-type
     *
     * @param int $id
     * @param array $taskType
     * @return string
     */
    public function update(int $id, array $taskType)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/dealTasktypes/' . $id, [
                'json' => [
                    'dealTasktype' => $taskType
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a taskType
     * @see https://developers.activecampaign.com/reference/delete-a-deal-task-type
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/dealTasktypes/' . $id);

        return 200 === $req->getStatusCode();
    }


    /**
     * List all taskTypes
     * @see https://youraccountname.api-us1.com/api/3/dealTasktypes
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/dealTasktypes', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }
}
