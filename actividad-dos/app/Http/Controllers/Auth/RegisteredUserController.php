<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Country;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries = Country::all() ;
        return view('auth.register',[
            'select1_option' => $countries,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       
        $request->validate([
            'nombre' => ['required', 'string','min:2' ,'max:20','regex:/(^([a-zA-Z_ ]+)(\d+)?$)/u'],
            'apellidos' => ['required', 'string','min:2' ,'max:40','regex:/(^([a-zA-Z_ ]+)(\d+)?$)/u'],
            'dni' => ['required', 'string','min:9','max:9','regex:/\d{8}?[a-zA-Z]/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class,
            'regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => !empty($request->telefono) ? ['string','min:9','max:12','regex:/^(\+\d{9,12})$/'] : [],
            'sobreti' => !empty($request->sobreti) ? ['string','min:20','max:250'] : [],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'sobreti' => $request->sobreti,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
