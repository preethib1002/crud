<?php

namespace App\Http\Controllers;
//use App\Models\Contact;
//use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{

   // dd(Auth::user());
   // if (Auth::user()){
   /* public function index()
    {
        //$user = Auth::user();
        $role= User::get("role");
        //if (Auth::user()->hasRole('admin')){
        $data['countries'] = Country::get(["country", "id"]);
        $contacts = Contact::all();
      // $contacts = Contact::join ('countries','contacts.country' , '=', 'countries.id')
        //->get (['countries']);


        $contacts = DB::table('contacts')
            ->join('countries', 'countries.id', '=', 'contacts.country')
            ->select('contacts.*', 'countries.country')
            ->get();

      // return $contacts;
        return view('contacts.index')->with('contacts', $contacts);
       // }
        //else{
         //   return hi;
        //}

    }


    public function create()
    {
        $countries = Country::all();
        return view('contacts.create', compact('countries'));
        $data['countries'] = Country::get(["country", "id"]);
        return view('contacts.create')->with('country',$data);

    }


    public function store(Request $request)
    {
        $input = $request->all();
        Contact::create($input);
        return redirect('contacts')->with('flash_message', 'Contact Addedd!');
    }


    public function show($id)
    {

        $contact = Contact::find($id);
        $data['countries'] = Country::get(["country", "id"]);
        $contacts = Contact::all();


        $contacts = DB::table('contacts')
            ->join('countries', 'countries.id', '=', 'contacts.country')
            ->select('contacts.*', 'countries.country')
            ->get();
        // return $contacts;
        return view('contacts.show')->with('contacts', $contact);

    }


    public function edit($id)
    {
        $countries = Country::all();
        $data['countries'] = Country::get(["country", "id"]);
        $contact = Contact::find($id);
        $contacts = DB::table('contacts')
        ->join('countries', 'countries.id', '=', 'contacts.country')
        ->select('contacts.*', 'countries.country')
        ->get();
        return view('contacts.edit')->with('contacts', $contact);

    }


    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $input = $request->all();
        $contact->update($input);
        return redirect('contacts')->with('flash_message', 'Contact Updated!');
    }


    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect('contacts')->with('flash_message', 'Contact deleted!');
}

public function fetchState(Request $request)
{
    $data['states'] = State::where("country_id", $request->country_id)
                            ->get(["name", "id"]);

    return response()->json($data);
}

public function fetchCity(Request $request)
{
    $data['cities'] = City::where("state_id", $request->state_id)
                                ->get(["name", "id"]);

    return response()->json($data);
}

*/

private $repository;

    public function __construct(ContactRepositoryInterface $repository)
    {

        $this->repository = $repository;

    }


    public function index()
    {

        //$contacts = $this->repository->getAll();
        $contacts = $this->repository->datajoin();
        return view('contacts.index')->with('contacts', $contacts);

    }

    public function create()
    {
        $countries = $this->repository->country();
        //$states= $this->repository->fetchState();
        return view('contacts.create', compact('countries'));

    }


public function fetchState(Request $request)
{
    $data['states'] = State::where("country_id", $request->country_id)
    ->get(["name", "id"]);


    return response()->json($data);
}


    public function store(Request $request)
    {

        $contacts = $this->repository->createContact($request);
        return redirect('contacts');

    }

    public function show($id)
    {

        $contact = $this->repository->getById($id);
        return view('contacts.show')->with('contacts', $contact);

    }

    public function edit($id)
    {

        $contact = $this->repository->getById($id);
        return view('contacts.edit')->with('contacts', $contact);

    }

    public function update(Request $request, $id)
    {

        $contact = $this->repository->updateContact($request,$id);
        return redirect('contacts')->with('flash_message', 'Contact Updated!');

    }

    public function destroy($id)
    {

        $contact = $this->repository->deleteContact($id);
        return redirect('contacts')->with('flash_message', 'Contact deleted!');

    }


   /*
    public function fetchState(Request $request)
    {
        return $data= $this->repository->fetchState();

    }

    */
}
