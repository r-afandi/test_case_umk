<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Wajib di-import

class ClassroomApiController extends Controller
{
    public function fetchExternalData()
    {
        // Ganti dengan URL API luar Anda yang sebenarnya
        $url = 'https://api-ruangan.vercel.app/rooms';

        try {
            // Melakukan HTTP GET request ke link luar
            $response = Http::timeout(10)->get($url); // Timeout 10 detik agar tidak stuck terlalu lama

            // Jika API luar merespons dengan sukses (status 200)
            if ($response->successful()) {
                $data = $response->json();

                // Opsi 1: Langsung return datanya ke frontend
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Data berhasil diambil dari API luar',
                    'data'    => $data
                ], 200);
            }

            // Jika API luar mengembalikan error (misal 404 atau 500)
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal mengambil data, API luar merespons dengan status: ' . $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            // Penanganan jika server API luar down / tidak bisa dihubungi sama sekali
            return response()->json([
                'status'  => 'error',
                'message' => 'Koneksi ke API luar terputus atau bermasalah: ' . $e->getMessage()
            ], 500);
        }
    }
}
