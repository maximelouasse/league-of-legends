<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    function getAllSkills() {
        return response()->view('pages.skills');
    }
}
