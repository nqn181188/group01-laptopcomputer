<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(REQUEST $request)
    {
        
        // $paginate = $request->paginate??12 ;
        // $custFb=$custFb->paginate($paginate);
        // $custFb = Feedback::all()->orderBy('created_at','desc')->get();
        // $custFb = Feedback::paginate(8)
        $read = $request->read??0;
        $custFb = Feedback::where('id','!=','0');
        if($read){
            $custFb->where('read',1);
        }
        $custFb = $custFb->paginate(8);

        return view('admin.feedback.index', compact(
            'custFb',
            'read',
        ));

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
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $feedback = Feedback::find($id);
        return view('admin.feedback.update', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $feedback = Feedback::find($id);
        $feedback->read  = $request->read;
        $feedback->note  = $request->note;
        $feedback->save();
        return redirect()->route('admin.contact.index')->with(['success_update'=>'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect()->route('admin.contact.index')->withSuccessDelete('Deleted'); 
    }
}
