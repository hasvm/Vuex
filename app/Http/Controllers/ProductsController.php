<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Lib\ApiCalls;
use App\Traits\ApiResponseCallsTrait;
use GuzzleHttp\Exception\GuzzleException;

class ProductsController extends Controller {

    use ApiResponseCallsTrait;

    public function listProducts(Request $request, $collectionId)
    {
        try {

            $apiCall = new ApiCalls();
            $response = $apiCall->getProductsList($collectionId);
            $products = json_decode($response->getBody());
            
        } catch(GuzzleException $e) {
            throw new Exception($e);
        
        } catch (Exception $e) {
            Log::error('Failed to get collections', [
                'trace' => $e->getTraceAsString()
            ]);
            return ['type' => 'error', 'Failed to retrive the collection'];
        }
        return ['type' => 'success', 'products' => $products->data ?? []];
    }
}