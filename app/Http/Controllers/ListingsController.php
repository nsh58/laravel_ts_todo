<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Listing $listingModel)
    {
        $listings = $listingModel->list();

        return view('listing/index', [
            'listings' => $listings,
        ]);
    }

    public function new()
    {
        return view('listing/new');
    }

    public function edit($listing_id, Listing $listingModel)
    {
        $listing = $listingModel->find($listing_id);

        return view('listing/edit', [
            'listing' => $listing,
        ]);
    }

    public function store(Request $request, Listing $listingModel)
    {
        $validator = Validator::make($request->all(), ['title' => 'required|max:255',]);

        if ($validator->fails()) {
            return redirect('/new')->withErrors($validator->errors())->withInput();
        }

        $listingModel->title = $request->title;
        $listingModel->user_id = Auth::user()->id;

        $listingModel->save();
        return redirect('/');
    }

    public function update(Request $request, Listing $listingModel)
    {
        $validator = Validator::make($request->all(), ['title' => 'required|max:255',]);

        if ($validator->fails()) {
            return redirect('/new')->withErrors($validator->errors())->withInput();
        }

        $listing = $listingModel->find($request->id);
        $listing->title = $request->title;

        $listing->save();
        return redirect('/');
    }

    public function destroy($listing_id, Listing $listingModel)
    {
        /** @var Listing $listing */
        $listing = $listingModel->find($listing_id);

        $listing->delete();
        return redirect('/');
    }
}
