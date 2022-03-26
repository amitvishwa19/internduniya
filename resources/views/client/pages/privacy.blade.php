@extends('client.layout.layout')

@section('title','News')


@section('style')
@endsection


@section('content')

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Privacy Policy</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="terms-conditions">
                        <div class="terms">
                            {!! $privacy->body !!}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection



@section('modal')
@endsection


@section('javascript')


  	<script>
  		$(function(){
         'use strict'





      });
  	</script>

@endsection
