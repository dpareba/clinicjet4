@extends('layouts.app')
@section('title')
	| Create New Clinic
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Clinic Registration</div>
                <div class="panel-body">
                     @include('partials.flash', ['some' => 'data'])
                    <form data-parsley-validate class="form-horizontal" role="form" method="POST" action="{{ route('clinics.store') }}">
                        {{ csrf_field() }}
                
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Clinic Name</label>

                            <div class="col-md-6">
                                                                  
                                   <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" event.preventDefault(); style="text-transform: uppercase;" autofocus required="" data-parsley-required-message="*Clinic Name cannot be blank!" placeholder="Clinic Name" maxlength="255"> 
                                                       
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       {{--  <div class="form-group{{ $errors->has('newclinictoken') ? ' has-error' : '' }}">
                            <label for="newclinictoken" class="col-md-4 control-label">Clinic Token</label>

                            <div class="col-md-6">
                                <input id="newclinictoken" type="text" class="form-control" name="newclinictoken" value="{{ old('newclinictoken') }}" required="" data-parsley-required-message="*The Clinic Token value is required to be filled in!" placeholder="Please enter valid Clinic Token">

                                @if ($errors->has('newclinictoken'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newclinictoken') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                       {{--  <div class="form-group{{ $errors->has('cliniclocation') ? ' has-error' : '' }}">
                            <label for="cliniclocation" class="col-md-4 control-label">Clinic Location</label>
                            
                            <div class="col-md-6">
                                <select name="cliniclocation" id="cliniclocation" class="js-example-basic-single form-control">
                                    <option value="" selected="selected"></option>
                                    <option value="Kenya" >Kenya</option>
                                    <option value="India" >India</option>
                                </select>

                                @if ($errors->has('cliniclocation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cliniclocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('clinictype') ? ' has-error' : '' }}">
                            <label for="clinictype" class="col-md-4 control-label">Clinic Type</label>

                            <div class="col-md-6">
                                <select required="" data-parsley-required-message="*Clinic Type is required" name="clinictype" id="clinictype" class="js-example-basic-single form-control">
                                    <option value="" selected="selected"></option>
                                    <option value="Hospital OPD" >HOSPITAL OPD</option>
                                    <option value="Nursing Home OPD" >NURSING HOME OPD</option>
                                    <option value="Polyclinic" >POLYCLINIC</option>
                                    <option value="Private Clinic" >PRIVATE CLINIC</option>
                                </select>

                                @if ($errors->has('clinictype'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('clinictype') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Clinic Address</label>

                            <div class="col-md-6">
                                <textarea event.preventDefault(); style="text-transform: uppercase;" name="address" id="address" cols="30" rows="4" class="form-control" required=""  data-parsley-required-message="*Clinic Address is required" placeholder="Clinic Address" style="resize: none;">{{old('address')}}</textarea>
                              
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       {{--  <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>
                            
                            <div class="col-md-6">
                                <select name="state" id="state" class="js-example-basic-single form-control">
                                    @foreach ($states as $state)
                                        <option value="{{$state->state}}" {{$state->state == 'Maharashtra' ? 'selected="selected"' : ''}}>{{$state->state}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{--  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>
                            
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"   placeholder="City" required="" data-parsley-required-message="*City Name is required" maxlength="255">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{--  <div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <label for="pin" class="col-md-4 control-label">Pin Code</label>
                            
                            <div class="col-md-6">
                                <input id="pin" data-parsley-type="digits" class="form-control" name="pin" value="{{ old('pin') }}" required=""  placeholder="Pin Code" maxlength="6" minlength="6" data-parsley-required-message="*Pin Code is required" >

                                @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('phoneprimary') ? ' has-error' : '' }}">
                            <label for="phoneprimary" class="col-md-4 control-label">Primary Phone{{-- <br><small><i>(For Landlines,prefix STD code without the leading 0, eg: 2266990077)</i></small> --}}</label>
                            
                            <div class="col-md-6">
                                <input event.preventDefault(); id="phoneprimary" required="" data-parsley-type="digits" class="form-control" name="phoneprimary" value="{{ old('phoneprimary') }}"   placeholder="Primary Phone" minlength="10" maxlength="10" data-parsley-required-message="*Clinic Phone Number is required">

                                @if ($errors->has('phoneprimary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneprimary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('phonealternate') ? ' has-error' : '' }}">
                            <label for="phonealternate" class="col-md-4 control-label">Alternate Phone</label>
                            
                            <div class="col-md-6">
                                <input id="phonealternate" data-parsley-type="digits" class="form-control" name="phonealternate" value="{{ old('phonealternate') }}"   placeholder="Alternate Phone"  minlength="10" maxlength="10" >

                                @if ($errors->has('phonealternate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonealternate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Clinic E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"   placeholder="Clinic e-mail Address (Optional)">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-block">
                                    Register New Clinic
                                </button>
                               {{--  <br>
                                <div class="text-center">
                                    Already have an account? <a href="{{ url('/login') }}"><strong>LOGIN</strong></a>
                                </div>
                                 --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
