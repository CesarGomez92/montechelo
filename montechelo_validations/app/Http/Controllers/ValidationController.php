<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Exception;
use App\Models\Validation;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class ValidationController extends Controller
{

    public function getToken() {
        $user = User::where('email', 'example@example.com')->first();

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::fromUser($user)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function validateCreateUser($key) {

        $value = request()->get('value');
        $validation = Validation::where('field_name', $key)->first();
        $errors = [];

        if ($validation->required) {
            if(! $value) {
                $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field is required'];
            }
        }
        if ($validation->data_type == 'number' && $value) {
            if (!is_numeric($value)){
                $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field is not numeric'];
            }
            if ($validation->min){
                if(strlen($value) < $validation->min){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field must have a minimum of ' . $validation->min . ' characters'];
                }
            }
            if ($validation->max){
                if(strlen($value) > $validation->max){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field must have a maximum of ' . $validation->max . ' characters'];
                }
            }
        }
        if ($validation->data_type == 'string' && $value) {
            if ($validation->min){
                if(strlen($value) < $validation->min){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field must have a minimum of ' . $validation->min . ' characters'];
                }
            }
            if ($validation->max){
                if(strlen($value) > $validation->max){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field must have a maximum of ' . $validation->max . ' characters'];
                }
            }
        }
        if ($validation->data_type == 'date' && $value) {
            if ($validation->min){
                if(intval(substr($value, 0, 4)) < $validation->min){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field cannot be less than the year ' . $validation->min];
                }
            }
            if ($validation->max){
                if(intval(substr($value, 0, 4)) > $validation->max){
                    $errors[] = [$validation->field_name => 'The ' . str_replace("_"," ", $validation->field_name) . ' field cannot be greater than the year ' . $validation->max];
                }
            }
        }

        if (count($errors) != 0) {
            foreach ($errors as $error) {
                Exception::create(['description' => $error[key($error)], 'data' => $value ?? 'null']);
            }
            return response()->json($errors, 400);
        } else {
            return 200;
        }

    }
}
