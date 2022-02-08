<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('user.index');
        // $contact = Contact::all()->toArray();
        // $data['chart_data'] = json_encode($contact);
        // return view('user.index', compact('contact'));

        $result = \DB::table('contacts')
                    ->select('meter', 'created_at')
                    ->orderBy('id', 'ASC')
                    ->get();
        return view('user.index')->with('result',json_encode($result, JSON_NUMERIC_CHECK));

        // $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
        // $data  = array(1, 2, 3, 4, 5);
        // return view('user.index',['Months' => $month, 'Data' => $data]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
        $this->validate($request,['name'=>'required', 'meter'=>'required']);
     
        $contact = new Contact([ //User รับค่ามาจาก Model User.php
            'name'=>$request->get('name'), 
            'meter'=>$request->get('meter') 
        ]);
        $contact->save();
        return redirect()->route('contact.create')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
