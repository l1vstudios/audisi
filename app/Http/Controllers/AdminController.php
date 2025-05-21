<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalFinalis = DB::table('tb_audisi')->where('status', 'finalis')->count();
    
        $totalEliminasi = DB::table('tb_audisi')->where('status', 'eliminasi')->count();
    
        $totalBlacklist = DB::table('tb_audisi')->where('status', 'blacklist')->count();

        $totalPeserta = DB::table('tb_audisi')->count();

    
        $data_audisi = DB::table('tb_audisi')->get();
    
        return view('admin', compact('data_audisi', 'totalFinalis', 'totalPeserta', 'totalEliminasi', 'totalBlacklist'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function login(Request $request)
    {
        return view('login');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = DB::table('tb_audisi')->where('id', $id)->first();
        
        if ($peserta) {
            return response()->json([
                'nama_lengkap' => $peserta->nama_lengkap,
                'kategori_audisi' => $peserta->kategori_audisi,
                'kategori_peserta' => $peserta->kategori_peserta,
                'jenis_kelamin' => $peserta->jenis_kelamin,
                'alamat' => $peserta->alamat,
                'status' => $peserta->status,
                'no_wa' => $peserta->no_wa,



                'link_vidio' => $peserta->link_vidio 
            ]);
        } else {
            return response()->json(['message' => 'Peserta not found'], 404);
        }
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminModel $adminModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:finalis,eliminasi',
        ]);

        $updated = DB::table('tb_audisi')
            ->where('id', $id)
            ->update(['status' => $request->status]);
        
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Status peserta berhasil diperbarui',
                'status' => $request->status
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status peserta'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminModel $adminModel)
    {
        //
    }
}
