<?php

namespace App\Traits;

use Exception;

trait ApiResponseCallsTrait {

    public function checkResponse($response)
    {
        switch ($response->getStatusCode()) {
            case 200:
                break;
            case 400:
                throw new Exception('Request body was incorrectly formatted. Likely invalid JSON.');
            
            case 401:
                throw new Exception('Provided access token is invalid or does not have access to requested resource.');

            case 404:
                throw new Exception('Requested resource not found.');
            
            case 500:
                throw new Exception('We had a problem with our server. Try again later.');
            
            default:
                throw new Exception('Something wen\'t wrong.');
        }
        return ['response' => 'ok'];
    }
}