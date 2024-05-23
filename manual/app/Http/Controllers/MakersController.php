<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;

class MakersController extends Controller
{
    public function index()
    {
        $makers = Maker::all();
        return view('maker/index', ['makers' => $makers]);
    }

    public function store(Request $request)
    {
        $maker = new Maker;
        $maker->name = $request->name;
        $maker->save();
        return redirect()->route('maker.index');
    }
}
