<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use Illuminate\Http\Request;

class ExceptionsController extends Controller
{
    public function getExceptions() {

        $exceptions = Exception::all();

        return $exceptions;

    }
}
