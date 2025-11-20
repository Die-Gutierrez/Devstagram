<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        $redes = [
            'facebook' => [
                'logo_url' => 'facebook.svg',
            ],
            'instagram' => [
                'logo_url' => 'instagram.svg',
            ],
            'x' => [
                'logo_url' => 'x.svg',
            ],
            'linkedin' => [
                'logo_url' => 'linkedin.svg',
            ],
            'whatsapp' => [
                'logo_url' => 'wsp.svg',
            ],
            'tiktok' => [
                'logo_url' => 'tiktok.svg',
            ],
        ];

        return view('index', ['redes' => $redes]);
    }
}
