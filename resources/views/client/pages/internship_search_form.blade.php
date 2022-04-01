<form method="get" action="{{route('app.internship.search')}}">
    @csrf
    <div class="row">
        <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
            <div class="job-field">
                <input type="text" placeholder="Title, keywords or company name" name="title" />
                <i class="la la-keyboard-o"></i>
            </div>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
            <div class="job-field">
                <select data-placeholder="City, province or region" class="chosen-city" name="city">
                    <option value="">-Select Location-</option>
                    @foreach($cities as $city)
                        <option value="{{$city->slug}}">{{$city->name}} </option>
                    @endforeach
                </select>
                <i class="la la-map-marker"></i>
            </div>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
            <button type="submit"><i class="la la-search"></i></button>
        </div>
    </div>
</form>