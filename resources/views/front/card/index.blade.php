@extends('layouts.front')
@section('title', 'Card')
@section('css')
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                            <h2 class="breadcrumb-title">Cart</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row cardRow">
               @include('front.card.row', ['cards' => $cards])
            </div>
        </div>
    </div>
    <!-- Cart Area End -->

@endsection

@section('js')
    <script>
        $(document).on('click','body .qtybutton',function(){
            var $button = $(this);
            var cardID = $button.parent().find("input").data('id');
            let amount = $button.parent().find("input").val();

            $.ajax({
                url: '{{ route('card.update') }}',
                type: "POST",
                data: {
                    cardID: cardID,
                    amount: amount
                },
                success: function (response)
                {
                    $('.cardRow').html(response.card);
                    var CartPlusMinus = $(".cart-plus-minus");
                    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
                    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
                }
            });

        });
    </script>
@endsection
