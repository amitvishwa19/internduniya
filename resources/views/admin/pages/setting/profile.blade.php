
<div class="row">

    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title">Personal Information</h4>                      
                    </div><!--end col-->                                                       
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body">                       
                <div class="form-group">
                    <label class=""><b>First Name</b></label>
                    <div class="">
                        <input class="form-control" type="text" value="{{auth()->user()->firstName}}" name="firstname">
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <small class="badge badge-secondary">{{ $errors->first('firstname') }}</small>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class=""><b>Last Name</b></label>
                    <div class="">
                        <input class="form-control" type="text" value="{{auth()->user()->lastName}}" name="lastname">
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <small class="badge badge-secondary">{{ $errors->first('lastname') }}</small>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class=""><b>Username</b></label>
                    <div class="">
                        <input type="text" class="form-control"  value="{{auth()->user()->username}}" name="username" disabled>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <small class="badge badge-secondary">{{ $errors->first('username') }}</small>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class=""><b>Email Address</b></label>
                    <div class="">
                        <div class="input-group ">
                            <input type="text" class="form-control" value="{{auth()->user()->email}}" name="email" disabled>
                        </div>
                    </div>
                </div>                                                
            </div>                                            
        </div>

    </div>
</div>

