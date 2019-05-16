@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Manage clients deposits</h3>
				
				@if(Session::has('message'))
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Client name</th>
								<th>Client email</th>
                                <th>Amount</th>
                                <th>Payment mode</th>
                                <th>Plan</th>
								<th>Status</th> 
                                <th>Date created</th>
                                <th>Option</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($deposits as $deposit)
							<tr> 
								<th scope="row">{{$deposit->id}}</th>
                                <td>{{$deposit->duser->name}}</td>
                                <td>{{$deposit->duser->email}}</td> 
								 <td>${{$deposit->amount}}</td> 
								 <td>{{$deposit->payment_mode}}</td>
								 @if(isset($deposit->dplan->name)) 
								 <td>{{$deposit->dplan->name}}</td>
								 @else
								 <td>For withdrawal</td>
								 @endif
                                 <td>{{$deposit->status}}</td> 
								 <td>{{$deposit->created_at}}</td> 
                                 <td> <a class="btn btn-default" href="{{ url('dashboard/pdeposit') }}/{{$deposit->id}}">Process</a></td> 
							</tr> 
							@endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')