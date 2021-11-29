<div class="col-lg-8 col-12">
    <form action="#">
        <div class="table-content table-responsive cart-table-content">
            <table>
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Until Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($cards->count() < 1)
                    <tr>
                        <td colspan="6">
                            Your cart is empty
                        </td>
                    </tr>
                @endif
                @php($totalPrice=0.00)
                @foreach($cards as $card)
                    <tr>
                        <td class="product-thumbnail">
                            <a href="#">
                                <img class="img-responsive ml-3"
                                     src="{{ asset($card->product->featureImage->image) }}"
                                     alt="{{ $card->product->product_name }}"/>
                            </a>
                        </td>
                        <td class="product-name"><a href="#">{{ $card->product->product_name }}</a></td>
                        <td class="product-price-cart"><span class="amount">{{ $card->product->price }} ₺</span>
                        </td>
                        <td class="product-quantity">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" data-id="{{ $card->id }}"
                                       name="qtybutton" value="{{ $card->amount }}"/>
                            </div>
                        </td>
                        <td class="product-subtotal">{{ $card->price_amount }} ₺</td>
                        <td class="product-remove">
                            <a href="#"><i class="icon-pencil"></i></a>
                            <a href="#"><i class="icon-close"></i></a>
                        </td>
                    </tr>
                    @php($totalPrice+=$card->price_amount)
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-clear">
                        <a href="{{ route('card.clear') }}">Clear Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-lg-4 col-md-12 mt-md-30px">
    <div class="grand-totall">
        <div class="title-wrap">
            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
        </div>
        <h5>Total <span>{{ number_format($totalPrice, 2) }} ₺</span></h5>
        <br>
        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
    </div>
</div>
