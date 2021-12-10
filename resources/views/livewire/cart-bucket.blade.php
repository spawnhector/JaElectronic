<div>
    <div class="wrap-icon-section minicart">
        <a  
        @if ($itemCount)
            href="{{route('cart')}}" 
        @endif 
            class="link-direction pointer">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <div class="left-info">
                <span class="index">
                    <span class="itemCount" id="itemCount">
                        @if ($itemCount)
                            {{$itemCount}}
                        @else
                            0
                        @endif 
                    </span>
                    items</span>
                <span class="title">CART</span>
            </div>
        </a>
    </div>
</div>
