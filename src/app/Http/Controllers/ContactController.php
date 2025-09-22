<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {
        if (!$request->isMethod('post')) {
        return redirect()->route('contact.index'); 
    }

        $validated = $request->validate(
            [
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'gender' => 'required',  
                'email'=>'required|email', 
                'tel1' => 'required|digits:3',
                'tel2' => 'required|digits:4',
                'tel3'=> 'required|digits:4',
                'address'=>'required|string',
                'building' => 'nullable|string',
                'department'=>'required', 
                'message'=>'required|string|max:120', 
            ]
            );
            return view('contact.confirm', ['validated'=> $validated]);
    }

    public function submit(Request $request)
    {   //保存処理
        return redirect()->route('contact.thanks');
    }

        //完了
    public function thanks(Request $request)
    {   //保存処理
        return view('contact.thanks');
    }
}
    