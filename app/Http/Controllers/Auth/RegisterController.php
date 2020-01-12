<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

    use RegistersUsers;

    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([

            // $input['slug'] = Str::slug($request->title);


            'name' => $data['name'],
            // adding slug when register
            // 'slug' => str_slug($data->name),
            // 'slug' => $data[Str::slug['name']],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // tambahkan role_id secara default adalah 3 atau subscriber
            'role_id' => 3
        ]);
    }
}
