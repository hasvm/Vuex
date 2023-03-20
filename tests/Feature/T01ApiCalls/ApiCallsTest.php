<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\Feature\T01ApiCalls\ApiCallsBase;

class ApiCallsTest extends ApiCallsBase
{
    use WithoutMiddleware;
    
    protected $collectionId = '63f52cf7b1c03';
    protected $itemId = '167701234205463f52d760d341';

    public function test_list_collections()
    {
        $endPoint = $this->listCollectionsEndPoint();
        $response = $this->get($endPoint);
        $response->assertOk();
        $this->validateApiResponseTest($response, 'listcollections');
    }

    public function test_list_collection_items()
    {
        $endPoint = $this->listCollectionItemsEndPoint($this->collectionId);
        $response = $this->get($endPoint);
        $response->assertOk();
        $this->validateApiResponseTest($response, 'listcollectionItems');
    }

    //public function test_place_order()
    //{
    //    $payload = $this->getPlaceOrderItemsPayload();
    //    $endPoint = $this->getPlaceOrderEndPoint();
    //    $response = $this->post($endPoint, $payload);
    //    $response->assertOk();
    //    check what is sent after placing an order
    //}
}
