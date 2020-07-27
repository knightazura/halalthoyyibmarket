<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sindria\Models\Zero\Package;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $package_collections = Package::all();
        $banners = [];
        $posts = [];

        $data = [
            'package_collections',
            'banners',
            'posts',
        ];

        if (Auth::user()) {
            $customer = Auth::user()->customer;
            array_push($data, 'customer');
        }

        return view('home', compact($data));
    }
}
