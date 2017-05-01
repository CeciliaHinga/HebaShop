@extends('layouts.app')

@section('title','Cart')

@section('content')       
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if(count($cart))
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    @foreach($products as $product)
                    <tr>
                    @if($product->id == $item->id && $product->identifier == Auth::user()->id) 
                      <td class="cart_product">
                            <a href=""><img class="media-object img-thumbnail" 
                            src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $product->ads_image. '.' . $product->image_extension . '?'. 'time='. time() }}"/>
</a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item->name}}</a></h4>
                            <p>{{$product->ads_content}}</p> 
                            <p>Web ID: {{$item->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>Ksh&puncsp;{{number_format($item->price, 2, '.', ',')}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form method="POST" action="{{url('advertisement/cart')}}">
                                <a class="cart_quantity_up" href='{{url("advertisement/cart?product_id=$item->id&increment=1")}}'> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href='{{url("advertisement/cart?product_id=$item->id&decrease=1")}}'> - </a>
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Ksh&puncsp;{{number_format($item->subtotal, 2, '.', ',')}}</p>
                        </td>
                        <td class="cart_delete">
                        {!! Form::open(['method' => 'DELETE','url' => ['cart-remove-item']]) !!}
                        <input type="hidden" value="{{$item->id}}" name="product_id"> 
            {!! Form::submit('&times;', ['class' => 'close']) !!}
            {!! Form::close() !!}
                            <!-- <a class="cart_quantity_delete" href="{{url('cart-remove-item')}}"><i class="fa fa-times"></i></a> -->
                        </td>
                    </tr>
                    @endif
                    @endforeach  @endforeach
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Kenya</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Mombasa</option>
                                <option>Nairobi</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>Ksh&puncsp;59</span></li>
                        <li>Tax <span>Ksh&puncsp;2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                    @foreach($products as $product)
                    @foreach($cart as $item)
                    @if($item->id == $product->id && $product->identifier == Auth::user()->id)
                        <li>Total <span>Ksh&puncsp;{{$item->total()}}</span></li>@endif @endforeach @endforeach
                    </ul>
                    <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
                    <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection