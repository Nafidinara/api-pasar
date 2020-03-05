<?php

namespace App\Http\Controllers;

use App\Kecambah;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecambahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecambah = Kecambah::orderBy('kecambah_id','ASC')->get();
        if(!empty($kecambah)){
            $response = [
                'msg' => 'list semua kecambah',
                'status_code' => '0001',
                'data' => $kecambah
            ];

            return response()->json($response,200);
        }else{
            $response = [
                'msg' => 'Data gagal ditemukan',
                'status_code' => '0011',
                'data' => ''
            ];

            return response()->json($response,404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'pembeli' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'jumlah_bayar' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $nama = $request->nama;
        $pembeli = $request->pembeli;
        $jumlah = $request->jumlah;
        $harga = $request->harga;
        $bayar = $request->jumlah_bayar;

        try{
            
            $kecambah = Kecambah::create([
                'nama' => $nama,
                'pembeli' => $pembeli,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'jumlah_bayar' => $bayar,
            ]);

            if($kecambah->save()){
                $response = [
                    'msg' => 'data berhasil di tambahkan',
                    'status_code' => '0001',
                    'data' => $kecambah
                ];
    
                return response()->json($response,200);
            }else{
                $response = [
                    'msg' => 'error menambahkan',
                    'status_code' => '0111',
                    'data' => ''
                ];
    
                return response()->json($response,400);
            }


        }catch(Exception $e){
            $response = [
                'msg' => 'error menambahkan',
                'status_code' => '1111',
                'data' => '',
                'error' => $e
            ];

            return response()->json($response,400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecambah = Kecambah::find($id);
        try{
            $kecambah->delete();
            if(!$kecambah->delete()){
                $response = [
                    'msg' => 'error menambahkan',
                    'status_code' => '1111',
                    'data' => '',
                ];
    
                return response()->json($response,400);
            }

            $response = [
                'msg' => 'berhasil menambahkan',
                'status_code' => '0001',
                'data' => '',
            ];

            return response()->json($response,200);
        }catch(Exception $e){
            $response = [
                'msg' => 'error menambahkan',
                'status_code' => '1111',
                'data' => '',
                'error' => $e
            ];

            return response()->json($response,400);
        }
        
    }
}
