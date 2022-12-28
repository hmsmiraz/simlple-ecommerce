<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->comments()->create(['body'=>$request->body,
        'created_by'=>auth()->user()]);
        return redirect()->back();
    }
}
