<!DOCTYPE html>
<html>
<head>
	<title>ClinicJet | Print</title>
</head>
<body>
	<style>
		div.absolute {
			position: absolute;
			right: 40px;
		} 

		.cc{
			margin-top:8px;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
			text-align: center;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
	<div class="absolute">Date: {{$visit->created_at->toDateString()}}</div>
	<div>Patient Id: <b>{{$visit->patient->patientcode}}</b></div>
	<div class="absolute">{{$visit->patient->gender}} Age: 
		@if ($visit->patient->dob != "1900-01-01 00:00:00")
		{{$visit->patient->dob->diff(Carbon::now())->format('%y')}}
		@else
		Date of Birth Not Provided
		@endif
	</div>
	<div>Patient Name: <b>{{$visit->patient->name}}</b></div>
	<div class="cc"><b>Chief Complaints: </b>{{$visit->chiefcomplaints}}</div>
	<div class="cc"><b>Findings: </b>{{$visit->examinationfindings}}</div>
	<div class="cc"><b>History: </b>{{$visit->patienthistory}}</div>
	<div class="cc"><b>Diagnosis: </b>{{$visit->diagnosis}}</div>
	<div class="cc"><b>Advise: </b>{{$visit->advise}}</div>
	<div class="absolute"><b>Follow Up Date: </b>
		@if ($visit->isSOS)
		On SOS or With Reports
		@else
		{{$visit->nextvisit}}
		@endif
	</div>
	<img class="cc" src="images/rx.jpg" alt="" style="width: 35px; height: 35px;">
	@if (count($visit->prescriptions)>0)
		<table>
		<thead>
			<tr>
				<th>Brand Name</th>
				<th>Regime</th>
				<th>Timing</th>
				<th>Duration</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($visit->prescriptions as $p)
				<tr>
					<td><b>{{$p->medicinename}}</b><br><small><i>({{$p->medicinecomposition}})</i></small></td>
					<td>{{$p->doseregime}}</td>
					<td>{{$p->dosetimings}}</td>
					<td>{{$p->doseduration}}</td>
					<td>{{$p->remarks}}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
	@endif
	
	<div class="cc"><b>Recommended Clinical Follow up</b>
		<ul>
			@foreach ($visit->pathologies as $pathology)
			<li>
				{{$pathology->name}}
			</li>
			@endforeach
		</ul>
	</div>
	<div class="absolute"><b>Signature:________________________</b></div>
	<br>
	<div></div>
	<br>
	<div></div>
	<div class="absolute"><i>signed by</i> Dr. {{$visit->created_by_name}}</b></div>
{{-- 	<br>
	<div></div>
	<div class="absolute"><i>on behalf of</i> Dr. {{$visit->created_by_name}}</div> --}}
</body>
</html>