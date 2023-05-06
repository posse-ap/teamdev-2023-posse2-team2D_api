<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Http\Jsonresponse;
use Symfony\Component\HttpFoundation\Response;


class ItemController extends Controller
{
    public function index(Request $request) {
        $items = Item::all();
        return response()->json([
            'apple' => 'red',
            'peach' => 'pink'
        ]
        );
    }
}


