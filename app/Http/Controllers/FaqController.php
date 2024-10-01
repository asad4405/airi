<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index()
    {
        $faqs = Faq::all();
        return view('backend.faq.index', compact('faqs'));
    }

    function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answar' => 'required',
        ]);

        Faq::create([
            'question' => $request->question,
            'answar' => $request->answar,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('faq_create', 'Faq Added Success!');
    }

    function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.faq.edit', compact('faq'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answar' => 'required',
        ]);

        $faq = Faq::findOrFail($id);

        $faq->update([
            'question' => $request->question,
            'answar' => $request->answar,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('faq.index')->with('success', 'Faq Updated Success!');
    }

    function delete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        
        return redirect()->route('faq.index')->with('success', 'Faq Deleted Success!');
    }
}
