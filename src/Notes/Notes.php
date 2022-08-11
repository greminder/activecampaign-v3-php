<?php

namespace Mediatoolkit\ActiveCampaign\Notes;

use Mediatoolkit\ActiveCampaign\Resource;

class Notes extends Resource
{

    /**
     * Create a note
     *
     * @param string $note
     * @param int $relid
     * @param string $reltype Possible Values: Activity, Deal, DealTask, Subscriber, CustomerAccount
     * @return string
     */
    public function create(string $note, int $relid, string $reltype): string
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/notes', [
                'json' => [
                    'note' => [
                        'note'    => $note,
                        'relid'   => $relid,
                        'reltype' => $reltype
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }
}
