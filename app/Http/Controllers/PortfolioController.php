<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        Visit::record('portfolio');

        $clients = [
            [
                'name' => 'Cooperativa Eléctrica de Pasteur',
                'url' => 'https://intercoopasteur.com.ar',
                'logo' => 'https://intercoopasteur.com.ar/wp-content/uploads/2020/06/logo-de-la-Cooperativa-1024x960.png',
                'description' => 'Sitio institucional y gestión digital para cooperativa eléctrica.',
            ],
            [
                'name' => 'Cooperativa de Agua Potable de Henderson',
                'url' => 'https://coophenderson.com.ar',
                'logo' => 'https://coophenderson.com.ar/wp-content/uploads/2021/11/Logo-Cooperativa-150x150.png',
                'description' => 'Plataforma web para servicios públicos de agua potable.',
            ],
            [
                'name' => 'Inca - Consultor Agropecuario',
                'url' => 'https://consultoragropecuario.com.ar',
                'logo' => 'https://consultoragropecuario.com.ar/wp-content/uploads/2022/05/Logo-elIn-png-768x559.png',
                'description' => 'Consultoría agropecuaria con presencia digital moderna.',
            ],
            [
                'name' => 'Cooperativa Agropecuaria Darregueira',
                'url' => 'https://sitio.coopdarregueira.com.ar',
                'logo' => asset('images/clients/coop-darregueira-wordmark.png'),
                'description' => 'Sitio institucional con secciones, clasificados rurales y servicios para socios.',
            ],
            [
                'name' => 'POS3D',
                'url' => 'https://pos3d.carabajaldev.com.ar',
                'logo' => asset('images/clients/pos3d.svg'),
                'description' => 'Sistema de punto de venta (POS) desarrollado con Laravel y Filament.',
            ],
        ];

        return view('portfolio', [
            'clients' => $clients,
            'avatar' => asset('images/avatar.png'),
        ]);
    }
}
