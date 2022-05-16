<?php

use App\Models\Validation;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('validations:create-default-values', function () {
    Validation::firstOrCreate(['field_name' => 'first_name'], ['required' => true, 'min' => 3, 'max' => 15]);
    Validation::firstOrCreate(['field_name' => 'last_name'], ['min' => 3, 'max' => 15]);
    Validation::firstOrCreate(['field_name' => 'phone'], ['data_type' => 'number','min' => 10, 'max' => 10]);
    Validation::firstOrCreate(['field_name' => 'identification'], ['required' => true, 'max' => 12]);
    Validation::firstOrCreate(['field_name' => 'date_of_birth'], ['data_type' => 'date', 'min' => 1922, 'max' => 2005]);
    $this->line('data created successfully');
})->purpose('create defaul values for validation table');
