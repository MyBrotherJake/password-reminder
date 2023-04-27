<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Password;

class DeleteController extends Controller
{
    //
    public function delete(Request $request)
    {
        $id = $request->id;
        $password = Password::where('id', '=', $id)->first();
        $password->delete();

        return redirect()->route('password.index')->with('feedback.success', "Deleted");
    }
}
