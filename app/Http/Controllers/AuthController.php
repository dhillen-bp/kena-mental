<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // cek apakah login valid
        if (Auth::attempt($credentials)) {

            // kasih session
            $request->session()->regenerate();

            if (Auth::user()) {
                return redirect('/');
            }

            // return redirect()->intended('dashboard');
        } else {
            Session::flash('status', 'fail');
            Session::flash('message', 'Login Invalid!');
            return redirect('/login');
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
        ]);

        // $request->password = Hash::make($request->password);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register success');

        return redirect('/register');
    }

    public function profile()
    {
        return view('client.profile');
    }

    // Auth with Github

    public function redirectToGithubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubProviderCallback()
    {

        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password' => Hash::make('secret'),
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/');

        // $user->token
    }

    // Admin Auth
    public function showLoginAdmin()
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return redirect('/admin');
        }
        return view('auth.login-admin');
    }

    public function processLoginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $request->session()->regenerate();
            Auth::logoutOtherDevices($request->input('password'));

            $admin = Auth::guard('admin')->user();
            if ($admin->role === 'admin') {
                return redirect('/admin/');
            } elseif ($admin->role === 'psychologist') {
                return redirect('/admin/psychologist');
            }
        } else {
            Session::flash('status', 'fail');
            Session::flash('message', 'Login Invalid!');
            return redirect('/admin/login');
        }
    }

    public function showRegisterAdmin()
    {
        $psychologists = Psychologist::select('id', 'name')->get();
        return view('auth.register-admin', compact('psychologists'));
    }

    public function processRegisterAdmin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'role'  => 'required'
        ]);

        // $request->password = Hash::make($request->password);
        $request->merge(['password' => Hash::make($request->password)]);
        $request['name'] = trim($request['name']);
        if ($request['role'] === 'admin') {
            $request->except('psychologist_id');
        }
        // return var_dump($request->all());
        $admin = Admin::create($request->all());

        Session::flash('success', 'Register success');

        return redirect('/admin/register')->with('success', "Admin created Successfully!")->withErrors($validated);;
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
