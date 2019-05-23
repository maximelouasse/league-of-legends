<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    function getAllAvatars() {
        return response()->view('pages.avatars');
    }
}
