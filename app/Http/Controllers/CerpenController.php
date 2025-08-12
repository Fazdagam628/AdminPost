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
        $search = $request->input('search');
        $cerpensQuery = Cerpen::query();
        if ($search) {
            // Ubah input ke uppercase
            $search = strtoupper($search);

            // case-insensitive search menggunakan UPPER() untuk semua kolom
            $cerpensQuery->where(function ($q) use ($search) {
                $q->whereHas('user', function ($query) use ($search) {
                    $query->whereRaw('UPPER(name) LIKE ?', ["%$search%"]);
                })
                    ->orWhereRaw('UPPER(judul) LIKE ?', ["%$search%"]);
            });
        }
        // Ambil sekitar 10 data cerpen
        $cerpens = $cerpensQuery->latest()->paginate(5)->appends($request->query());

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
