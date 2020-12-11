<?php

namespace App\Controller;

use App\Model\Inventario;

class IndexController
{
    public function index()
    {
        return 'Hello World - Home';
    }

    public function inventario($id)
    {
        return $id ? Inventario::where('id', $id)->get() : Inventario::all();
    }
}
