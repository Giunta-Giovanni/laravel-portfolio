<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return 'questa è la rotta index della dashboard';
    }
    public function profile()
    {
        return "pagina profile backoffice";
    }
}
