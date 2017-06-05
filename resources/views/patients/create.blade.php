@extends('layouts.master')
@section('title')
| Add New Patient
@stop
@section('pageheading')
Add New Patient
@stop
@section('subpageheading')
Register new patients in clinic
@stop
@section('content')
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border text-center">
				<h3 class="box-title">Register New Patient</h3><br><small class="text-green">(New Patient Registration Information)</small>
			</div>{{-- .box-header --}}

			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<form data-parsley-validate action="{{route('patients.store')}}" method="POST">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group {{ $errors->has('name')?'has-error':''}}">
								<label class="control-label" for="name">Full Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
									<input event.preventDefault(); style="text-transform: uppercase;" required="" value="{{old('name')}}" autofocus="" type="text" class="form-control" maxlength="255" id="name" name="name" placeholder="Enter Patient's Full Name"  data-parsley-required-message="Patient Name cannot be left blank">
								</div>

								<span class="help-block">{{$errors->first('name')}}</span>
							</div>{{-- .full name div --}}
						
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('dob')?'has-error':''}}">
								<label class="control-label" for="dob">Date of Birth (mm/dd/yyyy)</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									{{-- <input required="" value="{{old('dob')}}" autofocus="" type="text" class="form-control" maxlength="255" id="dob" dob="dob" placeholder="Enter Patient's Full dob"  data-parsley-required-message="Patient dob cannot be left blank"> --}}
									<input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="dob" id="dob" value="{{old('dob')}}">
								</div>

								<span class="help-block">{{$errors->first('dob')}}</span>
							</div>{{-- .full name div --}}
					</div>
				</div>{{-- .row --}}
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('gender')?'has-error':''}}">
							<label class="control-label" for="gender">Gender</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-transgender-alt"></i></span>
								<select required="" name="gender" id="gender" class="form-control">
									<option value="Male" selected="selected">MALE</option>
									<option value="Female" >FEMALE</option>
									<option value="Other" >OTHER</option>
								</select>
							</div>
							<span class="help-block">{{$errors->first('gender')}}</span>
						</div>{{-- .Gender div --}}
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('bloodgroup')?'has-error':''}}">
							<label class="control-label" for="bloodgroup">Blood Group</label>
							<div class="input-group">
								<span  class="input-group-addon"><i class="fa fa-tint"></i></span>
								<select required="" name="bloodgroup" id="bloodgroup" class="form-control">
									<option value="Not Known" selected="selected">NOT KNOWN</option>
									<option value="A+" >A RhD positive (A+)</option>
									<option value="A-" >A RhD negative (A-)</option>
									<option value="B+" >B RhD positive (B+)</option>
									<option value="B-" >B RhD negative (B-)</option>
									<option value="O+" >O RhD positive (O+)</option>
									<option value="O-" >O RhD negative (O-)</option>
									<option value="AB+" >AB RhD positive (AB+)</option>
									<option value="AB-" >AB RhD negative (AB-)</option>
								</select>
							</div>
							<span class="help-block">{{$errors->first('bloodgroup')}}</span>
						</div>{{-- .BloodGroup div --}}
					</div>
				</div>{{-- .row --}}
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('allergies')?'has-error':''}}">
							<label class="control-label" for="allergies">Known Allergies</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-bug"></i></span>
								<textarea  name="allergies" id="allergies" class="form-control" cols="30" rows="5" style="resize: none;text-transform: uppercase;"></textarea>
							</div>
							<span class="help-block">{{$errors->first('allergies')}}</span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('address')?'has-error':''}}">
							<label class="control-label" for="address">Postal Address</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<textarea required=""  name="address" id="address" class="form-control" cols="30" rows="5" style="resize: none;text-transform: uppercase;">{{old('address')}}</textarea>
							</div>
							<span class="help-block">{{$errors->first('address')}}</span>
						</div>
					</div>
				</div>{{-- .row --}}
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('phoneprimary')?'has-error':''}}">
							<label class="control-label" for="phoneprimary">Primary Phone</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-volume-control-phone"></i></span>
								<input required="" data-parsley-type="digits" value="{{old('phoneprimary')}}" type="text" class="form-control" id="phoneprimary" name="phoneprimary" placeholder="Enter Primary Phone Number" maxlength="15">
							</div>
							<span class="help-block">{{$errors->first('phoneprimary')}}</span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group {{ $errors->has('phonealternate')?'has-error':''}}">
							<label class="control-label" for="phonealternate">Alternate Phone</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-volume-control-phone"></i></span>
								<input data-parsley-type="digits" value="{{old('phonealternate')}}" type="text" class="form-control" id="phonealternate" name="phonealternate" placeholder="Enter Alternate Phone Number" maxlength="15">
							</div>
							<span class="help-block">{{$errors->first('phonealternate')}}</span>
						</div>
					</div>
				</div>{{-- .row --}}
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="form-group {{ $errors->has('email')?'has-error':''}}">
							<label class="control-label" for="email">Email Address</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
								<input value="{{old('email')}}" type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
							</div>
							<span class="help-block">{{$errors->first('email')}}</span>
						</div>
					</div>
				</div>{{-- .row --}}
			</div>{{-- .box-body --}}
			<div class="box-footer clearfix text-center">
				<div class="row">
					<div class="col-md-6">
					<button type="submit" class="btn btn-success btn-block">Register New Patient</button>  
					</div>
					<div class="col-md-6">
						<a href="{{route('patients.index')}}" class="btn btn-danger btn-block">Cancel</a>  
					</div>
				</div>
			</div>
		</div>{{-- .box-primary --}}
	</div>{{-- .col-md-12 col-xs-12--}}
</div>{{-- .row --}}
</form>
@stop
@section('scripts')
<script>
  $(function () {
    

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

   
  });
</script>
@stop