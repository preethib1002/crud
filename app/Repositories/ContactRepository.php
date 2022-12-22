<?php

namespace App\Repositories;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use App\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{


    public function getAll(){

        return Contact::all();

    }

    public function country(){

        return Country::all();

    }

    public function createContact($request)
    {

        return Contact::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'country'=>$request['country'],
            'state'=>$request['state'],
            'address'=>$request['address'],
            'zipcode'=>$request['zipcode'],
            'gender'=>$request['gender'],
            'mobile'=>$request['mobile'],
            'dateofbirth'=>$request['dateofbirth'],
        ]);

    }

    public function getById($id){

        return Contact::find($id);

    }

    public function updateContact($request,$id)
    {

        $contact= Contact::find($id);
        if($contact){
            $contact->name=$request['name'];
            $contact->email=$request['email'];
            $contact->country=$request['country'];
            $contact->state=$request['state'];
            $contact->address=$request['address'];
            $contact->zipcode=$request['zipcode'];
            $contact->gender=$request['gender'];
            $contact->mobile=$request['mobile'];
            $contact->dateofbirth=$request['dateofbirth'];
            $contact->save();
            return $contact;
        }

    }

    public function deleteContact($id)
    {

        $contact=Contact::destroy($id);

    }

    /*public function fetchState($id)
    {

        $state = State::where("country_id", $id->country_id)
                                ->get(["name", "id"]);

        //return State::all();
        return response()->json($state);

    }*/
    public function fetchState($request)
    {
       $data['states'] = State::where("country_id", $request->country_id)
        ->get(["name", "id"]);


    return response()->json($data);
    }

    public function datajoin()
    {

        return $contacts = DB::table('contacts')
        ->join('countries', 'countries.id', '=', 'contacts.country')
        ->select('contacts.*', 'countries.country')
        ->get();

    }


    /*
    private $model;
    public function __construct(Task $model)
	{
		$this->model = $model;
	}

    public function getAll(){

        return $this->model->all();

    }

    public function getById($id){

        return $this->model->find($id);

    }

    */

}
