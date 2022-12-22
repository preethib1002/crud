<?php

namespace App\Repositories;
use App\Repositories\ContactRepository;

interface ContactRepositoryInterface{

    public function getAll();

    public function country();

    public function createContact($request);

    public function getById($id);

    public function updateContact($request,$id);

    public function deleteContact($id);

    public function fetchState(Request $request);

    public function datajoin();

}
