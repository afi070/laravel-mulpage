<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Khurin Nafiah',
            'address' => 'Blora, Jawa Tengah',
            'email' => 'khurinnafiahh@gmail.com',
            'univ' => 'UIN Salatiga'
        ];
        
        return view('about', compact('data'));
    }
}