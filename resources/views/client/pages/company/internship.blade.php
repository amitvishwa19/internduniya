@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="profile-title d-flex">
        <h3>Internships</h3>
        <div class="mt-4"><a href="{{route('company.internship.new')}}" class="btn btn-primary">New Internship</a></div>
    </div>

	
	
	

    <div class="manage-jobs-sec addscroll">

		@if (session('message'))
			<div class="alert alert-primary alert-dismissible fade show  m-4" role="alert">
				<strong></strong> {{ session('message') }}
				<button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		@if($internships->count() > 0)
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
					<td style="width:40%">
						<div class="table-list-title i-description">
							<h5><a href="{{route('company.internship.view',$internship->id)}}" title="">{{$internship->title}}</a></h5>
							<span>{{$internship->description}}</span>
						</div>
					</td>
					<td>
						<span class="ml-5"><a href="{{route('company.internship.applications',$internship->id)}}">{{ $internship->applied_users->count() }}</a></span>
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
		@else
			<div class="alert alert-primary alert-dismissible fade show mt-2 m-4" role="alert">
				No Internship found ! Post your first internship <a href="{{route('company.internship.new')}}">Here</a>
			</div>
		@endif
    </div>

</div>

@endsection