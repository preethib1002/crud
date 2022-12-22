<?php

namespace App\Repositories;
use App\Models\Country;
use App\Repositories\CountryrepInterface;

class Countryerep implements CountryrepInterface
{

    public function getAll(){

        return Country::all();

    }


}
