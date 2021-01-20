<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-5">
                    <h3>{{ $element->titleText }}</h3>
                    <p>{{ $element->subTitleText }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($element->steps as $card)            
                <div class="col-xl-4 col-md-6">
                    <div class="single_service">
                        <div class="service_icon">
                            <i class="{{$card['icon']}}"></i>
                        </div>
                        <h4>{{$card['title']}}</h4>
                        <p>{{$card['subTitle']}}</p>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
</div>