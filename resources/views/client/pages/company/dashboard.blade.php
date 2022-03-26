@extends('client.pages.company.layout')



@section('main_content')
<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Dashboard</h3>
			<div class="extra-job-info">
				<span><i class="la la-clock-o"></i><strong>{{$total_internship}}</strong> Internship Posted</span>
				<span><i class="la la-file-text"></i><strong>{{$applications}}</strong> Application</span>
				<span><i class="la la-users"></i><strong>{{$active_internship}}</strong> Active Internship</span>
			</div>
			<table>
				<thead>
					<tr>
						<td>Title</td>
						<td>Applications</td>
						<td>Created &amp; Expired</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>

					@foreach($internships as $internship)
					<tr>
						<td>
							<div class="table-list-title">
								<h3><a href="{{route('company.internship.view',$internship->id)}}" title="">{{$internship->title}}</a></h3>
								<span><i class="la la-map-marker"></i>{{ucFirst($internship->city)}}, {{ucFirst($internship->state)}}</span>
							</div>
						</td>
						<td>
							<span class="applied-field">{{$internship->applied_users->count()}} Applied</span>
						</td>
						<td>
							<span>{{\Carbon\Carbon::parse($internship->start_date)->isoFormat('MMM Do YYYY')}}</span><br>
							<span>{{\Carbon\Carbon::parse($internship->end_date)->isoFormat('MMM Do YYYY')}}</span>
						</td>
						<td>
							<span class="status active">{{$internship->status == true ? "Active" : "Expired"}}</span>
						</td>
						<td>
							<ul class="action_job">
								<li><span>View Internship</span><a href="{{route('company.internship.view',$internship->id)}}" title=""><i class="la la-eye"></i></a></li>
								<li><span>Edit</span><a href="{{route('company.internship.edit',$internship->id)}}" title=""><i class="la la-pencil"></i></a></li>
								<li><span>Delete</span>
									<a href="{{route('company.internship.delete',$internship->id)}}" title=""><i class="la la-trash-o"></i></a>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection