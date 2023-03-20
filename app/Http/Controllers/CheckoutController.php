<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\ApiCalls;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\GuzzleException;
use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * @class CheckoutController
 */
class CheckoutController extends Controller
{

    public function placeOrder(Request $request)
    {
        try {
            $payload = $request->all();

            $rules = [
                'email' => 'required',
                'firstName' => 'required',
                'address' => 'required',
                'postalCode' => 'required'
            ];

            $validator = Validator::make($payload['info'], $rules, ApiCalls::$PLACE_ORDER_MESSAGES);

            if($validator->fails()) {
                $errors = ApiCalls::BuildPlaceOrderMessages($validator);
                return ['type' => 'error', 'errors' => $errors];
            }

            $apiCall = new ApiCalls();
            $response = $apiCall->processOrderShippingInfo($payload);
            $infoResponse = json_decode($response->getBody());

            $response = $apiCall->processOrderItems($payload, $infoResponse->ID);

        } catch(GuzzleException $e) {
            Log::error('Failed to get collections', [
                'trace' => $e->getTraceAsString()
            ]);
            return ['type' => 'error', 'Failed to process your order!'];
        
        } catch (Exception $e) {
            Log::error('Failed to get collections', [
                'trace' => $e->getTraceAsString()
            ]);
            return ['type' => 'error', 'Failed to process your order!'];
        }
        return ['type' => 'success'];
    }
}
