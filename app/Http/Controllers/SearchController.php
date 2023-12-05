<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
 {
    $searchTerm = $request->input('search');
    
    $results = Search::where('originalName', 'like', '%' . $searchTerm . '%')->get();

    if ($results->isEmpty()) {
        return view('search-results')->with('message', 'No results found.');
    }
    
    // dd($results);
    return view('search.results', ['results' => $results]);
 }

}
