<div class="video_area zigzag_bg_1 zigzag_bg_2"
    style="
            background-image: url(' {{ uploads_url($element->singleImage) }} ');
        ">
    <div class="video_area_inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                        <div class="video_text">
                        <div class="info">
                            <div class="info_inner">
                                    <h4>{{$element->titleText}}</h4>
                                    <p>{{$element->subTitleText}}</p>
                            </div>
                            <div class="icon_video">
                                    <a 
                                        class="popup-video" 
                                        href="{{$element->commentText}}">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>