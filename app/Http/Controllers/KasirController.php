<?php

namespace App\Http\Controllers;

use App\Makanan;
use App\DetailOrder;
use App\Transaksi;
use PDF;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanans = Makanan::all();
        return view('transaksi.index', compact('makanans'));
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
        $transaksi = new Transaksi();
        $transaksi->id_user = "1";
        $transaksi->total_bayar = $request->totalprice;
        $transaksi->save();
        $idtransaksi = $transaksi->id_transaksi;

        $foods = $request->order;
        $data = array();
        foreach ($foods as $food) {
            $data[] = [
                'id_makanan' => $food['id'],
                'qty' => $food['qty'],
                'id_transaksi' => $idtransaksi
            ];
        }
        DetailOrder::insert($data);
        return $data;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    public function orderan()
    {
        $transaksi = Transaksi::with('detailorder')->get();
        return view('transaksi.order', compact('transaksi'));
    }

    public function orderanpdf(Request $request)
    {
        $transaksi = Transaksi::with('detailorder')->get();
        $pdf = PDF::loadView('transaksi.orderpdf', compact('transaksi'));
        return $pdf->stream();
    }
}
