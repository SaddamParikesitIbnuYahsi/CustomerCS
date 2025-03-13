<?php

namespace App\Http\Controllers;

use App\Models\Cs;
use Illuminate\Http\Request;

class CsController extends Controller
{
    public function index()
    {
        $cs = Cs::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users retrieved succesfully',
            'data' => $cs
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'contactperson' => 'required|string',
            'contactnumber' => 'required|string',
        ]);

        $cs = Cs::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User created succesfully',
            'data' => $cs
        ], 201);
    }

    public function show($id)
    {
        $cs = Cs::find($id);

        if (!$cs) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved succesfully',
            'data' => $cs
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $cs = Cs::find($id);

        if(!$cs) {
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
        $cs->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated succesfully',
            'data' => $cs
        ], 200);
    }

    public function destroy($id)
    {
        $cs = Cs::find($id);

        if(!$cs) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $cs->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted succesfully',
            'data' => null
        ], 200);
    }
}