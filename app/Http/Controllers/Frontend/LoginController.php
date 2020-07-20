<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class LoginController extends Controller
{
	public function __construct() {
	 	$this->middleware('guest:employees', ['except' => ['logout']]);
	}

    public function index(Request $request) {
    	return view('frontend.login.index');
    }

    public function login(Request $request) {
    	$rules = [
            'employee_id' => 'required',
            'password'    => 'required',
        ];

        $request->validate($rules);

		if (Auth::guard('employees')->attempt(['employee_id' => $request->employee_id, 'password' => $request->password])) {
			// if successful, then redirect to their intended location
			return redirect('dashboard');
		}
		// if unsuccessful, then redirect back to the login with the form data
		return redirect()->back()->withInput($request->only('employee_id'));
    }

    public function logout(Request $request)
    {
        Auth::guard('employees')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
}
