<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
//            dd($request->name);
            
            $request->flash();

            $this->validate($request, [
                'name'      =>  'required',
                'email'     =>  'required',
                'message'   =>  'required'
            ]);

            Mail::send('emails.contact_form',['request' => $request], function($m) use ($request){
                $m->from('hello@vpilv.com', 'Contact Form Submission');
                $m->to('gretavpi@aol.com')->subject($request->name . ' contact from VPILV.com');
            });

            if (count(Mail::failures()) == 0) {
                 Session::flash('messages', 'Thanks for contacting us.  We will be in touch shortly');
            }
            else{
                Session::flash('messages', 'Looks like there were some errors with your message.  Please try to reach us by phone');
            }

            return redirect('/#contact');
           
    

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
}
