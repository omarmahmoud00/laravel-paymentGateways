@extends('layouts.main')

@section("css")

<link rel="stylesheet" href="{{ URL::asset('../assests/css/main.css') }}" />
{{-- 
      <style>
      </style> --}}

@endsection

@section('content')
       {{-- {{ dd($request->price)}} --}}
       <div class="button-stack" role="group" aria-label="Basic example">
       
        <form action="{{route('paypal.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">Paypal</button>
        </form>
    
        <form action="{{route('stripe.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">Stripe</button>
        </form>
    
        <!-- Assuming this button is not meant for form submission as it's outside a form -->
        <form action="{{route('instamojo.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">Instamojo</button>
        </form>

          <form action="{{route('mollie.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">Mollie</button>
        </form>

          <form action="{{route('paystack.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">Paystack</button>
        </form>

         <form action="{{route('sslcommerz.payment')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$request->price}}" name="price">
            <button type="submit" class="btn btn-secondary">SslCommerz</button>
        </form>


    </div>
    
    
@endsection










