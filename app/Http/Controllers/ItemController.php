<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    function getAllItems() {
        return response()->view('pages.items');
    }
}
