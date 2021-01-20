<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-5">
                    <h3>{{$element->titleText}}</h3>
                    <p>{{$element->subTitleText}}</p>
                </div>
            </div>
        </div>
        <div class="row grid">
            @foreach($element->galleryImages as $image)
            <div class="col-xl-6 col-lg-6 col-md-6 grid-item">
                <div class="single_gallery long_height"
                    style="background-image: url(' {{ uploads_url($image['name']) }} ')">
                    <a href="{{ uploads_url($image['name']) }}" class="popup-image"></a>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</div>