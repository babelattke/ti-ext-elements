<div class="order_area">
        <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-5">
                            <h3>{{$element->titleText}}</h3>
                            <p>{{$element->subTitleText}}</p>
                        </div>
                    </div>
                </div>
            @if (count($elementMenuItems))
            <div class="row">
                @foreach ($elementMenuItems as $elementItem)
                    <div class="col-xl-4 col-md-6">
                        <div class="single_order">
                        @if ($elementItem->hasMedia())
                            <div class="order_thumb">
                                <img    src="{{ $elementItem->getThumb() }}" 
                                        alt="{{ $elementItem->getBuyableName() }}">
                                <div class="order_price">
                                    <span>{{ currency_format($elementItem->getBuyablePrice()) }}</span>
                                </div>
                            </div>
                        @endif
                            <div class="order_info">
                                <h3><a href="#">{{ $elementItem->getBuyableName() }}</a></h3>
                                <p>{{ $elementItem['menu_description'] }}</p>
                                <a href="#" class="boxed_btn">@lang('babel.elements::default.elements_labels.order_now')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>