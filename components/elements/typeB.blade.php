<div class="section-main section-main-4 bg-primary-light slider_area">
   
    <!-- Content -->
    <div class="section-main-content container">
        <div class="row">
        <div class="col-md-6 pt-5">
            <h1 class="display-1">{{ $element->titleText }}</h1>
            <h4 class="mb-5">{!! $element->contentText !!}</h4>
            @if($element->buttonStatus)
            <a href="{{ restaurant_url('local/menus') }}" class="boxed_btn">
                <span>{{ $element->buttonText }}</span>
            </a>
            @endif
        </div>
        </div>
    </div>

    <!-- Image -->
    <div class="section-main-image ">
        <div     class="single_slider"        
            style="background-image: url(' {{ uploads_url($element->singleImage) }} ');
                background-size: cover">            
        </div>
    </div>
    
</div>