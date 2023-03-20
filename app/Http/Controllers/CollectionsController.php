<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Lib\ApiCalls;
use App\Traits\ApiResponseCallsTrait;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

class CollectionsController extends Controller {

    use ApiResponseCallsTrait;

    public function listCollections(Request $request)
    {
        $collections = null;

        try {
            
            $apiCall = new ApiCalls();
            $response = $apiCall->getCollectionsList();
            $collections = json_decode($response->getBody());
            
        } catch(GuzzleException $e) {
            throw new Exception($e);
        
        } catch (Exception $e) {
            Log::error('Failed to get collections', [
                'trace' => $e->getTraceAsString()
            ]);
            return ['type' => 'error', 'Failed to retrive the collection'];
        }
        return ['type' => 'success', 'collections' => $collections->data ?? []];
    }
}