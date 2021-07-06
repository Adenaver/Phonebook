<?php

namespace App\Http\Controllers\Phonebook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhonebookController extends Controller
{
    public function getPhonebook(){
        $clients = DB::table('phonebooks')->paginate(10);
        return view('phonebook', compact('clients'));
    }
    public function getSearchPhonebook(Request $request){
        $search = $request->get('query');
        $clients = DB::table('phonebooks')->where('name','LIKE','%' . $search . '%')->orderBy('name')->paginate(10);
        return view('phonebook', compact('clients'));
    }
}
