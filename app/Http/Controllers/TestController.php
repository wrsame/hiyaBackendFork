<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $customer = Customer::first();

        if ($customer) {
            $token = $customer->createToken('test_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json(['error' => 'Customer not found'], 404);
    }

}
