<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ContactRepositoryInterface;
//use App\Repositories\ContactRepository;

class AuthContactController extends Controller
{

    /*
public function index()
{

    $contacts = Contact::all();
    return response()->json([
        "success" => true,
        "message" => "Contact List",
        "data" => $contacts
        ]);
}
public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,[
            'name' =>'required',
            'email' => 'required',
            'country' =>'required',
            'state'=>'required',
            'address' =>'required',
            'zipcode'=>'required',
            'gender'=>'required',
            'mobile'=>'required',
            'dateofbirth' =>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
            }
        $contact=Contact::create($input);
        return response()->json([
            "success" => true,
            "message" => "Contact created successfully.",
            "data" => $contact
            ]);
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        if (is_null($contact)) {
            return $this->sendError('Contact not found.');
            }
        return response()->json([
            "success" => true,
            "message" => "Contact retrieved successfully.",
            "data" => $contact
            ]);

    }


    public function update(Request $request,Contact $contact)
    {
            $input = $request->all();
            $validator=Validator::make($input,[
                'name' =>'required',
                'email' => 'required',
                'country' =>'required',
                'state'=>'required',
                'address' =>'required',
                'zipcode'=>'required',
                'gender'=>'required',
                 'mobile'=>'required',
                'dateofbirth' =>'required'
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
                }
                $contact->name=$input['name'];
                $contact->email=$input['email'];
                $contact->country=$input['country'];
                $contact->state=$input['state'];
                $contact->address=$input['address'];
                $contact->zipcode=$input['zipcode'];
                $contact->gender=$input['gender'];
                $contact->mobile=$input['mobile'];
                $contact->dateofbirth=$input['dateofbirth'];
                $contact->save();
            //$contact=Contact::update($input);
            return response()->json([
                "success" => true,
                "message" => "Contact updated successfully.",
                "data" => $contact
                ]);
    }
    public function destroy($id)
    {
        $contact=Contact::destroy($id);
        return response()->json([
            "success" => true,
            "message" => "Contact deleted successfully.",
            ]);
}

*/

    private $repository;

    public function __construct(ContactRepositoryInterface $repository)
    {

        $this->repository = $repository;

    }

    public function index()
    {

        $data = $this->repository->getAll();
        return response()->json([
            "success" => true,
            "message" => "Contact List",
            "data" => $data
            ]);

    }

    public function store(Request $request)
    {
        $contact = $this->repository->createContact($request);
        return response()->json([
            "success" => true,
            "message" => "Contact created successfully.",
            "data" => $contact
            ]);

    }

    public function show($id)
    {

        $contact = $this->repository->getById($id);
        return response()->json([
            "success" => true,
            "message" => "Contact retrieved successfully.",
            "data" => $contact
            ]);

    }

    public function update(Request $request,$id)
    {

        $contact = $this->repository->updateContact($request,$id);
        return response()->json([
            "success" => true,
            "message" => "Contact updated successfully.",
            "data" => $contact
            ]);

    }

    public function destroy($id)
    {

        $contact = $this->repository->deleteContact($id);
        return response()->json([
            "success" => true,
            "message" => "Contact deleted successfully.",
            ]);

    }

}
// $validator=Validator::make($input,[
           // 'name' =>'required',
           // 'email' => 'required',
           // 'country' =>'required',
            //'state'=>'required',
            //'address' =>'required',
            //'zipcode'=>'required',
            //'gender'=>'required',
            //'mobile'=>'required',
            //'dateofbirth' =>'required'
        //]);
        //if($validator->fails()){
           // return $this->sendError('Validation Error.', $validator->errors());
            //}
           // $contact->name=$input['name'];
           // $contact->save();
