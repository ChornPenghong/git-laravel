<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObjectController extends Controller
{
    public function index() {
        $objs = Http::get('https://api.restful-api.dev/objects');

        $objects = $objs->json();

        $objects = collect($objects)->map(function ($obj) {
            return (object) $obj;
        });

        return view('object.index', compact('objects'));
    }
}
