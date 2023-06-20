<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quote = Quote::latest()->paginate(10);

        return QuoteResource::collection($quote);
    }
    
    public function show(Quote $quote)
    {

        return new QuoteResource($quote);
    }
    
    public function store(Request $request) //ngambil data
    {
        $this->validate($request, [
            'message' => 'required|max:500',
        ]);
        
        $quote = Quote::create([
            'id_user' => auth()->id(),
            'message' => $request->message,
        ]);

        return new QuoteResource($quote);
    }
}