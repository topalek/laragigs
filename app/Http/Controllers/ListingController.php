<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        request('tag');
        $listings = Listing::latest()->filter(request(['tag', 'search']))->get();
        return view('listing.index', compact('listings'));
    }

    public function create()
    {
        return view('listing.create');
    }

    public function store(Request $request)
    {
        $filds = $request->validate([
            'title'       => 'required|string',
            'tags'        => 'required|string',
            'company'     => 'required|string',
            'location'    => 'required|string',
            'email'       => 'required|email',
            'website'     => 'required|url',
            'description' => 'required|string',
        ]);

        Listing::create($filds);

        return redirect('/')->with('message', 'success');
    }

    public function show(Listing $listing
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('listing.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        //
    }

    public function update(Request $request, Listing $listing)
    {
        //
    }

    public function destroy(Listing $listing)
    {
        //
    }
}
