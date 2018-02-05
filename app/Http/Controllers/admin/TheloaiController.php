<?php

namespace App\Http\Controllers\admin;

use App\Theloai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        return view('admin.theloai.index');    
    }
    public function getAdd()
    {
        return view('admin.theloai.index');    
    }
    public function getEdit()
    {
        return view('admin.theloai.index');    
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function show(Theloai $theloai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function edit(Theloai $theloai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theloai $theloai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theloai $theloai)
    {
        //
    }
}
