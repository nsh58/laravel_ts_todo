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

    public function index(Request $request, Listing $listing)
    {
        $listings = $listing->list();

        return view('listing/index', [
            'listings' => $listings,
        ]);
    }

    public function new()
    {
        return view('listing/new');
    }

    public function edit($listing_id, listing $listings)
    {
        $listing = $listings->find($listing_id);

        return view('listing/edit', [
            'listing' => $listing,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['list_name' => 'required|max:255',]);

         if ($validator->fails()) {
             return redirect('/new')->withErrors($validator->errors())->withInput();
         }

         $listings = new Listing();
         $listings->title = $request->list_name;
         $listings->user_id = Auth::user()->id;

         $listings->save();
         return redirect('/');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['list_name' => 'required|max:255',]);

        if ($validator->fails()) {
            return redirect('/new')->withErrors($validator->errors())->withInput();
        }

        $listing = Listing::find($request->id);
        $listing->title = $request->list_name;

        $listing->save();
        return redirect('/');
    }
}
