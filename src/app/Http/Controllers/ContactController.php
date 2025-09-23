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

        $validator = \Validator::make($request->all(),
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
            ], 
            [
                'first_name.required'=>'性を入力してください',
                'last_name.required'=>'名を入力してください',
                'gender.required' => '性別を選択してください',  
                'email.required'=>'メールアドレスを入力してください', 
                'email.email'=>'正しいメールアドレス形式を入力してください', 
                'address.required'=>'住所を入力してください',
                'department.required'=>'お問い合わせの種類を選択してください', 
                'message.required'=>'お問い合わせ内容を確認してください', 
                'message.max' => 'お問い合わせ内容は120文字以内で入力してください',
            ]);

    $validator->after(function ($validator) use ($request) {
    if (!$request->tel1 || !$request->tel2 || !$request->tel3) {
        $validator->errors()->add('tel', '電話番号を入力してください');
    }
    });

    if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
    }
        $validated=$validator->validated();

        $request->session()->flashInput($validated);
    return view('contact.confirm', ['validated'=> $validated]);

    }

    public function submit(Request $request)
    {   //保存処理
        return redirect()->route('contact.thanks');
    }

        //完了
    public function thanks(Request $request)
    {   
        return view('contact.thanks');
    }
}
    