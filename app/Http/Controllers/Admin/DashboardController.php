<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return "sono in index admin";
    }
    public function profile()
    {
        return "pagina profile backoffice";
    }
}
