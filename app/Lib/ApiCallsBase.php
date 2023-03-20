<?php

namespace App\Lib;

abstract class ApiCallsBase
{
    protected function getHeaders()
    {
        return [
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer ' . config('app.ycode_api_token')
            ],
        ];
    }

    protected function getCollectionsUrl()
    {
        return '/collections';
    }

    protected function getCollectionsItesmUrl($collectionId)
    {
        return "/collections/$collectionId/items";
    }
}