<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(){
    $countries = DB::select('select * from countries');
    return view('contacts.index')->with('countries', $countries);
}
}
