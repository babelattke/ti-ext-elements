<div class="slider_area"> 
    <div    class="single_slider"
            style="
                background-image: url(' {{ uploads_url($element->singleImage) }} ');
            ">
        <div class="single_slider-iner">
            <div class="slider_content text-center" style="background: {{$element->stepsBackground}}">
                <h3>{{$element->titleText}}</h3>
                    <p>{{$element->subTitleText}}</p>
            </div>
        </div>
    </div>    
</div>