<?php

namespace App\Lib;

use App\Lib\ProductsConstants;
use GuzzleHttp\Client;
use App\Traits\ApiResponseCallsTrait;
use App\Lib\ApiCallsBase;

class ApiCalls extends ApiCallsBase
{
    use ApiResponseCallsTrait;

    public function getCollectionsList()
    {
        $collectionsUrl = $this->getCollectionsUrl();
        $apiCall = new Client($this->getHeaders());
        $response = $apiCall->request('GET', config('app.ycode_api_url') . $collectionsUrl);
        $this->checkResponse($response);
        return $response;
    }

    public function getProductsList($collectionId)
    {
        $productsUrl = $this->getCollectionsItesmUrl($collectionId);
        $apiCall = new Client($this->getHeaders());
        $response = $apiCall->request('GET', config('app.ycode_api_url') . $productsUrl);
        $this->checkResponse($response);
        return $response;
    }

    private function convertShippingInfo($data)
    {
        $info = $data['info'];
        $shippingCost = ProductsConstants::$SHIPPING_COST;

        return [
            'Customer name' => $info['firstName'] . ' ' . $info['lastName'],
            'Email' => $info['email'],
            'Phone' => $info['phone'],
            'Address line 1' => $info['address'],
            'Address line 2' => $info['apartment'],
            'City' => $info['city'],
            'Country' => $info['country'],
            'State' => $info['region'],
            'ZIP' => $info['postalCode'],
            'Total' => $data['subTotal'] + $shippingCost,
            'Subtotal' => $data['subTotal'],
            'Shipping' => $shippingCost
        ];
    }

    public function processOrderShippingInfo($payload)
    {
        $orderUrl = $this->getCollectionsItesmUrl($payload['info']['orderId']);
        $apiCall = new Client($this->getHeaders());
        $response = $apiCall->request('POST', config('app.ycode_api_url') . $orderUrl, [
            'json' => $this->convertShippingInfo($payload)
        ]);

        $this->checkResponse($response);
        return $response;

    }

    private function convertOrderItemsInfo($data, $orderId)
    {
        return [
            'Name' => $data['ID'],
            'Product' => $data['Name'],
            'Quantity' => $data['quantity'],
            'Order' => $orderId
        ];
    }

    public function processOrderItems($payload, $orderId)
    {
        foreach($payload['order'] as $order) {
            $orderUrl = $this->getCollectionsItesmUrl($payload['info']['orderItemId']);
            $apiCall = new Client($this->getHeaders());
            $response = $apiCall->request('POST', config('app.ycode_api_url') . $orderUrl, [
                'json' => $this->convertOrderItemsInfo($order, $orderId)
            ]);
            $this->checkResponse($response);
        }
        return ['type' => 'success'];
    }

    public static $PLACE_ORDER_MESSAGES = [
        'email.required' => 'Please insert your email.',
        'firstName.required' => 'Please insert your First Name.',
        'address.required' => 'Please insert your Address.',
        'postalCode.required' => 'Please insert your Zip Code.',
    ];

    public static function BuildPlaceOrderMessages($validator)
    {
        $messages = $validator->messages();
        
        return [
            'email' => $messages->first('email'),
            'firstName' => $messages->first('firstName'),
            'address' => $messages->first('address'),
            'postalCode' => $messages->first('postalCode'),
        ];
    }
}