<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('product-view');
    }

    public function create()
    {
        return view('product-add');
    }
}
