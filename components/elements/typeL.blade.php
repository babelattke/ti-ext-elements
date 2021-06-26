<div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                
    <!-- ImgLeft -->
    <article class="post post-wide animated animate__animated animate__fadeIn visible" data-animation="fadeIn">
        <div class="post-image bg-parallax" 
            style="background-image: url({{uploads_url($element->singleImage)}});">  
        </div>
        <div class="post-content">
            <ul class="post-comment">
                <li>{{ $element->titleText }}</li>
            </ul>
            <h4>{{ $element->subTitleText }}</h4>
            <p>{!! $element->contentText !!}</p>
        </div>
    </article>

        </div>
    </div>
</div>