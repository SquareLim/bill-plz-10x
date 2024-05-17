<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PasswordController extends Controller
{
    //

    public function generatePassword(Request $request)
    {
        /*Example you can call this endpoint like this:
        http://127.0.0.1:8000/generatePassword?length=10&includeLowercase=false&includeUppercase=true&includeNumbers=true&includeSymbols=false
        */
        $length = $request->input('length', 8);
        if ($length <= 7) {
            return response()->json(['message' => "Password length must be greater than 7"], 400);
        }

        $includeLowercase = $request->input('includeLowercase', 'true') !== 'false';
        $includeUppercase = $request->input('includeUppercase', 'true') !== 'false';
        $includeNumbers = $request->input('includeNumbers', 'true') !== 'false';
        $includeSymbols = $request->input('includeSymbols', 'true') !== 'false';
    
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $symbols = '!#$%&()*+@^';
        
        $characters = '';
        if ($includeLowercase) {
            $characters .= $lowercase;
        }
        if ($includeUppercase) {
            $characters .= $uppercase;
        }
        if ($includeNumbers) {
            $characters .= $numbers;
        }
        if ($includeSymbols) {
            $characters .= $symbols;
        }
        

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return response()->json(['message' => "Password generated successfully", 'password' => $password], 200);
    }
}
