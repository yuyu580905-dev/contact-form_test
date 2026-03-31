<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // 名前 or メール検索（統合検索）
        if (!empty($request->keyword)) {

            $query->where(function ($q) use ($request) {

                $keyword = $request->keyword;

                $q->where('last_name', 'like', "%{$keyword}%")
                    ->orWhere('first_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        // 性別検索
        if (!empty($request->gender)) {

            $query->where('gender', $request->gender);
        }

        // カテゴリ検索
        if (!empty($request->category_id)) {

            $query->where('category_id', $request->category_id);
        }

        // 日付検索
        if (!empty($request->created_at)) {

            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query
            ->with('category')
            ->paginate(7)
            ->appends($request->all());

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('admin.index');
    }
}
