@extends('contacts.layout')
@section('content')

<div class="card">
  <div class="card-header">Contact's Page</div>
  <div class="card-body">

      <form action="{{ url('contacts') }}" method="post">
        {!! csrf_field() !!}
        {{-- @method("PATCH") --}}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <label>Gender</label></br>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other</br>
        <label>Date Of Birth</label></br>
        <input type="date" name="dateofbirth" id="dateofbirth" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>

        <label>Country</label></br>

      <div class="form-group mb-3">
        <select  id="country-dropdown"  name="country" class="form-control">
            <option value="">-- Select Country --</option>
              @foreach ($countries as $data)
          <option value="{{$data->id}}">
              {{$data->country}}
          </option>
          @endforeach
          {{-- @foreach($countries as $country)
          <option value="{{ $country->id }}">{{ $country->country }}</option>
      @endforeach --}}


        </select>
    </div>
    <label>State</label></br>
    <div class="form-group mb-3">
        <select id="state-dropdown" name="state" class="form-control">
            <option value="">-- Select State --</option>
{{--
            @foreach ($states as $data)
            <option value="{{$data->id}}">
                {{$data->name}}
            </option>
            @endforeach --}}
        </select>
    </div>
    {{-- <label>City</label></br>
    <div class="form-group mb-3">
        <select id="city-dropdown" name="city" class="form-control">
            <option value="">-- Select City --</option>

        </select>
    </div> --}}
        <label>Zip Code</label></br>
        <input type="number" name="zipcode" id="zipcode" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {


        $('#country-dropdown').on('change', function () {
            var id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dropdown').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dropdown").append('<option value="' + value
                            .name + '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');
                }
            });
        });
        $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .name + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@stop
