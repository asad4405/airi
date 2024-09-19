<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        $tags = Tag::all();
        return view('backend.tag.tag',compact('tags'));
    }

    function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required',
        ]);

        Tag::insert([
            'tag_name' => $request->tag_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','Tag Added Success!');
    }

    function delete($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tag.index')->with('tag_delete','Tag Deleted Success!');
    }
}
