<?php

namespace Tests\Feature\T01ApiCalls;

use Tests\TestCase;

class ApiCallsBase extends TestCase
{
    public function listCollectionsEndPoint()
    {
        return '/collections/list';
    }

    public function listCollectionItemsEndPoint($collectionId)
    {
        return "/products/list/$collectionId";
    }

    public function getPlaceOrderEndPoint()
    {
        return "/checkout/place-order";
    }

    public function getPlaceOrderPayload()
    {
        //create factory
        return [
            'Name' => '',
            'Customer name' => '',
            'Email' => '',
            'Phone' => '',
            'Address line 1' => '',
            'Address line 2' => '',
            'City' => '',
            'Country' => '',
            'State' => '',
            'ZIP' => '',
            'Total' => '',
            'Subtotal' => '',
            'Shipping' => '',
        ];
    }

    public function getPlaceOrderItemsPayload()
    {
        //create factory
        return [
            'Name' => '',
            'Product' => '',
            'Quantity' => '',
            'Order' => '',
        ];
    }

    public function validateApiResponseTest($response, $type)
    {
        $response->assertJsonFragment(['type' => 'success']);
    }
}
