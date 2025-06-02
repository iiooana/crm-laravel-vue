<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websites = Website::orderBy('created_at','desc')->paginate(1)->withQueryString();
        //dd($websites);
        return Inertia::render('Websites/Index',["websites" => $websites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Websites/Edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[              
            'domain' => 'bail|required|max:255'
        ]);
        //TODO: add regex domain
        $validator->after(function ($validator) use ($request){
            if(Website::where('domain',$request->domain)->count() > 0){
                $validator->errors()->add('domain','This domain already exits.');
            }else if(Website::withTrashed()->where('domain',$request->domain)->count() > 0){
                $validator->errors()->add('domain','This domain is trashed, make a request to active it.');
            }
        });
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        Website::create(['domain'=>$request->domain]);
        return redirect()->route('websites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Website $website)
    {
        //  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website)
    {
        //
    }
}
