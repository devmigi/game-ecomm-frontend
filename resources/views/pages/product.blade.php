@extends('layouts.main')

@section('title', 'Home')

@section('content')
    {{-- Breadcrumbs --}}
    <nav class="bg-grey-light p-3 rounded font-sans w-full mx-3">
        <ul class="list-reset flex text-grey-dark text-xs">
            <li><a href="/" class="text-blue font-bold">Home</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="/{{ $product->category->slug }}" class="text-blue font-bold">{{ $product->category->name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li>{{ $product->name }}</li>
        </ul>
    </nav>


    {{-- Product Top Section --}}
    <div class="lg:flex flex-row px-4 lg:px-6 py-3">
        <div class="flex flex-1 lg:mr-4 mb-4 border border-gray-100">
            <div class="w-16 mr-3 p-3">
                @foreach($product->images as $productImage)
                    <img class="shadow" src="{{ $productImage->image->web_url }}" alt="{{ $product->name }}">
                @endforeach
            </div>
            <div class="flex-1 text-center p-3">
                <img class="inline-block" style="max-height: 70vh"  src="{{ $product->images[0]->image->web_url }}" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="flex-1 px-3">
            <h2 class="text-3xl">{{ $product->name }}</h2>
            <div class="text-2xl py-2">
                <span class="font-semibold text-gray-900">₹{{ $product->selling_price }}</span>
                @if($product->selling_price < $product->mrp)
                    <span class="ml-1 line-through text-sm text-gray-600">₹{{ $product->mrp }}</span>
                @endif
            </div>
            <div class="mt-4">
                <a class="inline-block uppercase bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-3" href="">
                    Buy Now
                </a>
                <a class="inline-block uppercase bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded" href="">
                    Sell this Game
                </a>
            </div>

            @if(count($productVersions) > 0)
                <div class="mt-8 text-sm">
                    <div class="p-2">Also available in:</div>
                    <div class="pt-0 ">
                        @foreach($productVersions as $productVersion)
                            <a class="inline-block bg-gray-800 text-gray-100 rounded-full px-4 py-1 mr-2" href="/{{ $productVersion->category->slug . '/' . $productVersion->slug }}">
                                <span>{{ $productVersion->version->name }}</span>
                                <span class="text-xs">- ₹{{ $productVersion->selling_price }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
