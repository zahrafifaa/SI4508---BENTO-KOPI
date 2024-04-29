<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::select('id', 'name', 'address')->get();
        return view('branches.index', compact('branches'));
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.show', compact('branch'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $branches = Branch::where('name', 'like', "%$query%")->get();
        return view('branches.search', compact('branches', 'query'));
    }
}
