<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy ('created_at', 'desc')->paginate(7);
        return view('admin.index', compact('contacts'));
    }
//検索
    public function search(Request $request)
    {
        $query = Contact::query();

        if($request->filled('keyword')){
            $query->where('name', 'like', "%{$request->keyword}%");
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('admin.index', compact('contacts'));
    }
//エクスポート
    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', "%{$request->keyword}%");
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $filename = 'contacts.csv';
        $handle = fopen($filename, 'w');

        fputcsv($handle, ['ID', '名前', 'メール', '作成日', '性別', 'お問い合わせ内容']);

        foreach ($contacts as $c) {
            fputcsv($handle, [$c->id, $c->name, $c->email, $c->created_at, $c->gender, $c->message]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
    public function dashboard()
    {
        $contacts = Contact::orderBy ('created_at', 'desc')->paginate(7);
        return view('admin.dashboard', compact('contacts'));
    }
}

//管理者分だけ関数配置予定
