@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="flex">
        @foreach($categories as $category)
            <a href="#" class="p-1 lg:py-4 m-1 lg:m-2 flex flex-col lg:flex-row flex-1 justify-start lg:justify-center text-center lg:bg-gray-100 hover:bg-gray-200">
                <div>
                    <img src="{{ $category->image->web_url }}" class="w-14 lg:w-12 m-auto lg:mr-2 rounded border border-gray-100"  alt="">

                </div>
                <div class="my-2 text-xs md:text-lg">
                    {{ $category->name }}
                </div>
            </a>
        @endforeach
    </div>

    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @foreach($sliders as $slider)
                    <li class="glide__slide">
                        <img class="h-auto w-full object-cover" src="{{ $slider->image->web_url }}" alt="">
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
