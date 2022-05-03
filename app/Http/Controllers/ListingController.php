<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        request('tag');
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
        return view('listing.index', compact('listings'));
    }

    public function create()
    {
        return view('listing.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title'       => 'required|string',
            'tags'        => 'required|string',
            'company'     => 'required|string',
            'location'    => 'required|string',
            'email'       => 'required|email',
            'website'     => 'required|url',
            'description' => 'required|string',
//            'logo'        => 'mimes:jpeg,gif,png',
        ]);

        if ($request->hasFile('logo')) {
            $fields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($fields);

        return redirect('/')->with('message', 'Listing successfully created');
    }

    public function show(Listing $listing
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('listing.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('listing.edit', compact('listing'));
    }

    public function manage()
    {
        $listings = Listing::all();
        return view('listing.manage', compact('listings'));
    }

    public function update(Request $request, Listing $listing)
    {
        $fields = $request->validate([
            'title'       => 'required|string',
            'tags'        => 'required|string',
            'company'     => 'required|string',
            'location'    => 'required|string',
            'email'       => 'required|email',
            'website'     => 'required|url',
            'description' => 'required|string',
//            'logo'        => 'mimes:jpeg,gif,png',
        ]);
        if ($request->hasFile('logo')) {
            $fields['logo'] = $request->file('logo')->store('logos', 'public');
            Storage::delete('public/' . $listing->logo);
        }
        $listing->update($fields);

        return redirect()->route('listing.show', compact('listing'))->with('message', 'Listing updated');
    }

    public function destroy(Listing $listing)
    {
        if ($listing->logo) {
            Storage::delete('public/' . $listing->logo);
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted');
    }
}
