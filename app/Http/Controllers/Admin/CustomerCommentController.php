<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerComment;
use Illuminate\Http\Request;

class CustomerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cusComments = CustomerComment::all();
        return view('admin.comment.index', compact('cusComments'));
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
     * @param  \App\Models\CustomerComment  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerComment $customerComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerComment  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerComment $customerComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerComment  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerComment $customerComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerComment  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerComment $customerComment)
    {
        //
    }
}