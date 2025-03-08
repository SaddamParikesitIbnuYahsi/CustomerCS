<?php

namespace App\Http\Controllers;

use App\Models\Cs;
use Illuminate\Http\Request;

class CsController extends Controller
{
    public function index()
    {
        $user1s = User1::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users retrieved succesfully',
            'data' => $user1s
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'contactperson' => 'required|string',
            'contactnumber' => 'required|string',
        ]);

        $user1s = User1::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User created succesfully',
            'data' => $user1s
        ], 201);
    }

    public function show($id)
    {
        $user1s = User1::find($id);

        if (!$user1s) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved succesfully',
            'data' => $user1s
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user1s = User1::find($id);

        if(!$user1s) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'contactperson' => 'required|string',
            'contactnumber' => 'required|string',
        ]);
        $user1s->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated succesfully',
            'data' => $user1s
        ], 200);
    }

    public function destroy($id)
    {
        $user1s = User1::find($id);

        if(!$user1s) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $user1s->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted succesfully',
            'data' => null
        ], 200);
    }
}