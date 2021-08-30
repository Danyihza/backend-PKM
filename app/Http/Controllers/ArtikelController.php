<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function getAllArticles()
    {
        try {
            $articles = Artikel::where('artikel_utama', 'NO')->orderBy('created_at', 'desc')->get();
            if (count($articles) == 0) {
                return response()->json([
                    'success' => true,
                    'is_empty' => true
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'is_empty' => false,
                    'data' => $articles
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi Kesalahan Pada: ' . $th->getMessage()
            ]);
        }
    }

    public function getHeadline()
    {
        try {
            $articles = Artikel::where('artikel_utama', 'YES')->first();
            if ($articles) {
                return response()->json([
                    'success' => true,
                    'is_empty' => false,
                    'message' => 'Berhasi Mengambil Data',
                    'data' => $articles
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'is_empty' => true,
                    'message' => 'Data tidak ada'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi Kesalahan Pada: ' . $th->getMessage()
            ]);
        }
    }
    public function detailArticle(Request $request)
    {
        try {
            $this->validate($request, [
                'id_artikel' => 'required'
            ]);
            $articles = Artikel::where('id_artikel', $request->id_artikel)->first();
            if ($articles) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasi Mengambil Data',
                    'data' => $articles
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Data tidak ada'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi Kesalahan Pada: ' . $th->getMessage()
            ]);
        }
    }
}
