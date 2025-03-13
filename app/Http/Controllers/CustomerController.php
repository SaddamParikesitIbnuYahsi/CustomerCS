<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users retrieved succesfully',
            'data' => $customers
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
        ]);

        $customers = User1::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User created succesfully',
            'data' => $customers
        ], 201);
    }

    public function show($id)
    {
        $customers = Customer::find($id);

        if (!$customers) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved succesfully',
            'data' => $customers
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);

        if(!$customers) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
        ]);
        $customers->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated succesfully',
            'data' => $customers
        ], 200);
    }

    public function destroy($id)
    {
        $customers = Customer::find($id);

        if(!$customers) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $customers->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted succesfully',
            'data' => null
        ], 200);
    }
}
