<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Potensi;
use App\Models\Perangkat;

class LandingpageController extends Controller
{
    public function landingPage(){
        $berita = Berita::orderBy('judul', 'asc')->paginate(6);
        $potensi = Potensi::orderBy('judul', 'asc')->paginate(3);
        $perangkat = Perangkat::paginate(3);
        return view('landingpage', compact('berita', 'potensi', 'perangkat'));
    }

    public function showDetail($type, $slug)
    {
        if ($type == 'berita') {
            $item = Berita::where('slug', $slug)->firstOrFail();
        } else if ($type == 'potensi') {
            $item = Potensi::where('slug', $slug)->firstOrFail();
        } else {
            abort(404);
        }
        return view('detail', compact('item', 'type'));
    }
}
