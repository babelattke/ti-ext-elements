<div class="menu-list-area mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-5 text-center">
                    <h3>{{$element->titleText}}</h3>
                    
                </div>
            </div>
        </div>
        <div class="row">
        @if (count($elementMenuItems))
                           
                <div class="col one_half menu-items-container shadow" >
                    <h2 class="ppb_menu_title">{{$element->commentText}}</h2>
                    @foreach ($elementMenuItems as $elementItem)
                    <div class="menu-content-simple my-4">
                        <h5 class="menu-item">
                            <span class="menu-title" >{{ $elementItem->getBuyableName() }}</span>
                            <span class="menu_dots"></span>
                            <span class="menu-price pull-right" >{{ currency_format($elementItem->getBuyablePrice()) }}</span>
                        </h5>
                        <div class="menu-description">{{ $elementItem['menu_description'] }}</div>
                    </div>
                    @endforeach    
                </div>
            
                <div class="col-7 one_half last" >
                    <img src="{{ uploads_url($element->singleImage) }}" alt="">                              
                </div>
                <br class="clear">                   
            
        @endif
        </div>        
    </div>
</div>


<style>


.one_half.last
{
	float: right;
	width: 48%;
	margin-right: 0;
	clear: right;
}

.menu-items-container {
    width: 40%; 
    left: 90px; 
    background: rgb(255, 255, 255); 
    padding: 20px; 
    z-index: 2; 
    display: block; 
    transform: translate3d(0px, 14.1891px, 0px);
}

.menu-item {
    margin-bottom: 0.7rem;
}

.menu-description {
    margin-left: 0.7rem;
}

.menu-price {
    color: #56A75F;
}

</style>