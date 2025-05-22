<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = DB::table('masterdata_provinsi')->get();
        return view('register', compact('provinces'));
    }



    public function getCitiesByProvince(Request $request)
    {
        $provinceId = $request->input('provinsi_id'); 
        
        $cities = DB::table('masterdata_kabkota')
                    ->where('kode_provinsi', $provinceId)
                    ->get();

        return response()->json($cities);
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
        // dd($request->all());
      
        $audisiData = [
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kategori_audisi' => $request->kategori_audisi,
            'link_vidio' => $request->link_vidio,
            'photo' => $request->photo,

            'kategori_peserta' => $request->kategori_peserta,
            'nama_lengkap' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            // 'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_wa' => $request->telepon,
            'pekerjaan' => $request->pekerjaan,
            'nama_sekolah' => $request->institusi,
            'hobby' => $request->hobby,
            'pengalaman' => $request->pengalaman,
            'bahasa_yangdisukai' => $request->bahasa,
            'nama_ortu' => $request->nama_ortu,
            'telepon_ortu' => $request->telepon_ortu,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
        ];
    
        try {
            $audisi = \App\Models\RegisterModel::create($audisiData);
            return redirect()->back()->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar untuk The Golden Talent Hunt 2025.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.')->withInput();
        }
    }

    /**
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterModel $registerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterModel $registerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterModel $registerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterModel $registerModel)
    {
        //
    }
}
