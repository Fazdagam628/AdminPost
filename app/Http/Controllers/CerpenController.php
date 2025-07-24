<?php

namespace App\Http\Controllers;

use App\Models\Cerpen;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CerpenController extends Controller
{
    public function index(Request $request)
    {
        // Ambil sekitar 10 data cerpen
        $cerpens = Cerpen::latest()->paginate(10);

        return view('cerpen.index', compact('cerpens'));
    }

    public function show(Cerpen $cerpen): View
    {
        $viewkey = 'viewed_cerpen_' . $cerpen->id;

        if (!Session::has($viewkey)) {
            $cerpen->increment('views');
            Session::put($viewkey, true);
        }

        return view('cerpen.detail', compact('cerpen'));
    }
}
