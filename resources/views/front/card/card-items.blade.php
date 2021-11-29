@php($totalPrice=0.00)
<div class="head">
    <span class="title">Cart</span>
    <button class="offcanvas-close">×</button>
</div>
<div class="body customScroll">
    <ul class="minicart-product-list">
@foreach($cards as $card)
    <li>
        <a href="{{ route('product.viewDetail', ['slug' => $card->product->slug]) }}" class="image">
            <img src="{{ $card->product->featureImage->image }}" alt="{{ $card->product->product_name }}"></a>
        <div class="content">
            <a href="{{ route('product.viewDetail', ['slug' => $card->product->slug]) }}" class="title">
                {{ $card->product->product_name }}
            </a>
            <span class="quantity-price">{{ $card->amount }} x <span class="amount">{{ $card->product->price }}</span></span>
            <a href="#" class="remove removeCard" data-id="{{ $card->id }}">×</a>
        </div>
    </li>
    @php($totalPrice+=$card->price_amount)
@endforeach
    </ul>
</div>

<div class="foot">
    <div class="sub-total">
        <table class="table">
            <tbody>
            <tr>
                <td class="text-left">Total :</td>
                <td class="text-right">{{ number_format($totalPrice, 2) }} ₺</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="buttons">
        <a href="{{ route('card') }}" class="btn btn-dark btn-hover-primary mb-6">view cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-outline-dark current-btn">checkout</a>
    </div>
</div>
