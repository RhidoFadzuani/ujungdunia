<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Kecamatan::with('desa')->get()]);
    }
}
