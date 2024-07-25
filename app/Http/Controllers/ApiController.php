<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Api;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:apis|max:12|min:10',
            'email' => 'required|unique:apis|email',
            'password' => 'required|max:10|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'error',
                'errors' => $validator->errors(),
            ]);
        }

        $data = new Api;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return response()->json([
            'status' => 200,
            'message' => 'Data Saved Successfully',
            'response' => $data,
        ]);
    }

    public function getall()
    {
        $data = Api::all();
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function getuser($id)
    {
        $data = Api::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);

    }

    public function delete($id)
    {
        $data = Api::find($id);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message'=>'Data Deleted',
     
        ]);
    }
}
