@extends('contacts.layout')
@section('content')


<div class="card">
  <div class="card-header">Contact's Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">Name : {{ $contacts->name }}</h5>
        <p class="card-text">Address : {{ $contacts->address }}</p>
        <p class="card-text">Phone : {{ $contacts->mobile }}</p>
        <p class="card-text">Gender : {{ $contacts->gender }}</p>
        <p class="card-text">Date Of Birth : {{ $contacts->dateofbirth }}</p>
        <p class="card-text">Email : {{ $contacts->email }}</p>
        <p class="card-text">State : {{ $contacts->state }}</p>
       {{-- {{print_r($contacts )}} --}}
        <p class="card-text">Country : {{ $contacts->country }}</p>
        <p class="card-text">ZipCode : {{ $contacts->zipcode }}</p>
  </div>

    </hr>

  </div>
</div>
