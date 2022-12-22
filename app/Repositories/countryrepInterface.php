<?php

namespace App\Repositories;
use App\Repositories\Countryrep;

interface CountryrepInterface{

    public function getAll();

    //public function createContact($request);

    public function getById($id);

   //public function updateContact($request,$id);

    //public function deleteContact($id);

}
