<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function show()
    {
        return view('editProfile');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $user->update($data);
        return back();
    }
}
