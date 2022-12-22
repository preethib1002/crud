@extends('contacts.layout')
@section('content')

<div class="card">
  <div class="card-header">Contact's Page</div>
  <div class="card-body">

      <form action="{{ url('contacts/' .$contacts->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$contacts->id}}"  />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$contacts->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$contacts->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$contacts->mobile}}" class="form-control"></br>
        <label>Gender</label></br>
        {{-- <input type="radio" name="gender" value="{{$contacts->gender}}"> Male<br>
        <input type="radio" name="gender" value="{{$contacts->gender}}"> Female<br>
        <input type="radio" name="gender" value="{{$contacts->gender}}"> Other</br> --}}
        <input type="text" name="gender" id="gender" value="{{$contacts->gender}}" class="form-control"></br>
        <label>Date Of Birth</label></br>
        {{-- {{print_r($contacts->dateofbirth)}} --}}
        <input type="date" name="dateofbirth" id="dataofbirth" value="{{$contacts->dateofbirth}}" class="form-control">
        <label>Email</label></br>
        <input type="email" name="email" id="email" value="{{$contacts->email}}" class="form-control">


        {{-- {{print_r($contacts->country)}} --}}

        {{-- <select name="country" id="country" form="form-control">
            @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}} </option>
            @endforeach
          </select> --}}
{{--
          <select  id="country-dropdown" class="form-control">
            <option value="">-- Select Country --</option>
            @foreach ($countries as $data)
            <option value="{{$data->id}}">
                {{$data->name  }}
            </option>
            @endforeach

        </select> --}}


        <label>Country</label></br>

      <div class="form-group mb-3">
        <select  id="country-dropdown"  name="country" class="form-control">
            <option value="{{$contacts->country}}">{{$contacts->country}}</option>
            {{-- @foreach ($countries as $data)
            <option value="{{$data->id}}">
                {{$data->country}}
            </option>
            @endforeach --}}
          {{-- @foreach($countries as $country)
          <option value="{{ $country->id }}">{{ $country->name }}</option>
      @endforeach --}}


        </select>
    </div>
    <label>State</label></br>
    <div class="form-group mb-3">
        <select id="state-dropdown" name="state" class="form-control">
            <option value="{{$contacts->state}}">{{$contacts->state}}</option>

        </select>
    </div>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
