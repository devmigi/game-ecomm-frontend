@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides bg-gray-400">
                @foreach($sliders as $slider)
                    <li class="glide__slide">
                        <img class="h-80 w-full object-contain" src="{{ $slider->image->web_url }}" alt="">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
            <button class="glide__bullet" data-glide-dir="=0"></button>
            <button class="glide__bullet" data-glide-dir="=1"></button>
            <button class="glide__bullet" data-glide-dir="=2"></button>
        </div>

        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
        </div>
    </div>
@endsection
