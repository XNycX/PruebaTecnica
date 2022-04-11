<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    //create crud address
    public function getAll()
    {
        try {
            $addresses = Address::all();
            Log::info('get all addreses done');
            $data = [
                'data' => $addresses,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }



    public function createAddress(Request $request)
    {
        try {
            $address = new Address();
            $address->calle = $request->calle;
            $address->numero = $request->numero;
            $address->puerta = $request->puerta;
            $address->poblacion = $request->poblacion;
            $address->save();
            return response()->json($address, 201);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error creating address'], 500);
        }
    }

    public function getById(Request $request)
    {
        try {
            $address = Address::find($request->id);
            if ($address) {
                return response()->json($address, 200);
            } else {
                return response()->json(['message' => 'Address not found'], 404);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error reading address'], 500);
        }
    }

    public function updateById(Request $request)
    {
        try {
            $address = Address::find($request->id);
            if ($address) {
                $address->calle = $request->calle;
                $address->numero = $request->numero;
                $address->puerta = $request->puerta;
                $address->poblacion = $request->poblacion;
                $address->save();
                return response()->json($address, 200);
            } else {
                return response()->json(['message' => 'Address not found'], 404);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error updating address'], 500);
        }
    }

    public function removeAddressById(Request $request)
    {
        try {
            $address = Address::find($request->id);
            if ($address) {
                $address->delete();
                return response()->json(['message' => 'Address deleted'], 200);
            } else {
                return response()->json(['message' => 'Address not found'], 404);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error deleting address'], 500);
        }
    }

}
