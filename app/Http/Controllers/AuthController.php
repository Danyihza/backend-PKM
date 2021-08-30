<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkRegistered(Request $request)
    {
        $no_wa = $request->no_wa;
        $user = User::where('no_wa', $no_wa)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'Already registered'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'code' => 0,
            'message' => 'Not yet registered'
        ]);
    }

    public function getAllUser(Request $request)
    {
        try {
            $users = User::all();
            return response()->json([
                'success' => true,
                'message' => 'All data has been retrieved',
                'data' => $users
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $th->getMessage(),
            ]);
        }
    }
}
