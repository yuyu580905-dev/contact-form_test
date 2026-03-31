<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $genderList = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $category = Category::find($request->category_id);

        return view('confirm', array_merge(
            $request->all(),
            [
                'gender_text' => $genderList[$request->gender],
                'category_content' => $category->content,
            ]
        ));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->except(['tel1', 'tel2', 'tel3']);

        $contact['tel'] =
            $request->tel1 .
            $request->tel2 .
            $request->tel3;

        Contact::create($contact);

        return view('thanks');
    }

    public function thanks(Request $request)
    {
        $tel = $request->tel1 . $request->tel2 . $request->tel3;

        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $tel,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);

        return view('thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')
            ->withInput($request->all());
    }
}
