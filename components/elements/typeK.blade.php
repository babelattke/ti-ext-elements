<article class="post single">
    <div class="post-image bg-parallax" 
        style="background-image: url({{uploads_url($element->singleImage)}});">  >  
    </div>
    <div class="container container-md">
        <div class="post-content">
            <ul class="post-comment">
                <li>{{ $element->titleText }}</li>
            </ul>
            <h1 class="post-title">{{ $element->subTitleText }}</h1>
            <hr>

            <span class="lead">{!! $element->contentText !!}</span>
            
            
            <hr>            
            
        </div>
    </div>
</article>
