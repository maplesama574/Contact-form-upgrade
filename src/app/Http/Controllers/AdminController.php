<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class AdminController extends Controller
{

    public function search(Request $request)
    {
        $query = User::query();

        if($request->filled('keyword')){
            $query->where('name', 'like', "%{$request->keyword}%");
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $users = $query->get();

        return view('admin.dashboard', compact('users'));
    }

    public function export(Request $request)
    {
        $query = User::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', "%{$request->keyword}%");
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $users = $query->get();

        $filename = 'users.csv';
        $handle = fopen($filename, 'w');

        // ヘッダー
        fputcsv($handle, ['ID', '名前', 'メール', '作成日']);

        // データ行
        foreach ($users as $user) {
            fputcsv($handle, [$user->id, $user->name, $user->email, $user->created_at]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
    public function dashboard()
    {
        $contacts = Contact::all();
        return view('admin.dashboard', compact('contacts'));
    }
}

//管理者分だけ関数配置予定
