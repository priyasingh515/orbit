<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Offer;
class OfferController extends Controller
{
    //

    public function index()
    {
        $offers = DB::table('offers')->get();
        return view('admin.offer.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        Offer::create([
            'description' => $request->description
        ]);

        return redirect()->route('offer.index')->with('success', 'Offer added successfully!');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('admin.offer.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update([
            'description' => $request->description
        ]);

        return redirect()->route('offer.index')->with('success', 'Offer updated successfully!');
    }

    public function destroy($id)
    {
        Offer::findOrFail($id)->delete();
        return redirect()->route('offer.index')->with('success', 'Offer deleted successfully!');
    }

}
