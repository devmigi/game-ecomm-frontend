@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="flex">
        @foreach($categories as $category)
            <a href="#" class="p-1 lg:py-2 flex flex-col lg:flex-row flex-1 justify-start lg:justify-center text-center mx-1 mt-3 lg:mt-0 hover:bg-gray-200">
                <div>
                    <img src="{{ $category->image->web_url }}" class="w-14 lg:w-10 m-auto lg:mr-2 rounded border border-gray-100"  alt="">
                </div>
                <div class="my-2 text-xs md:text-base text-gray-800">
                    {{ $category->name }}
                </div>
            </a>
        @endforeach
    </div>

    @foreach($sections as $section)

        @if($section->type == 'item_slider')
           <section class="mb-4">
               @if($section->title)
                   <h2 class="section-title py-2 text-xl">{{ $section->title }}</h2>
               @endif
               <div class="glide slider">
                   <div class="glide__track" data-glide-el="track">
                       <ul class="glide__slides">
                           @foreach($section->items as $slider)
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
               </div>
           </section>

        @elseif($section->type == 'product_carousel')
            <section class="px-2 md:px-8">
                @if($section->title)
                    <h2 class="section-title py-3 text-xl">{{ $section->title }}</h2>
                @endif

                <div class="glide carousel">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @foreach($section->items as $item)
                                <li class="glide__slide">
                                    <a href="/{{ $item->product->category->slug . '/' . $item->product->slug }}">
                                        <div class="mx-2">
                                            <img class="h-auto w-full object-cover" src="{{ $item->image->web_url }}" alt="">
                                            <div class="pb-1 pt-3">
                                                @if($item->product->selling_price < $item->product->mrp)
                                                    <span class="line-through text-sm text-gray-600">₹{{ $item->product->mrp }}</span>
                                                @endif
                                                <span class="font-semibold text-gray-900">₹{{ $item->product->selling_price }}</span>
                                            </div>
                                            <div class="text-base">{{ $item->product->name }}</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Carouse Controls --}}
                    <div class="glide__arrows lg:text-xl text-sm" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </section>

        @elseif($section->type == 'item_grid')
            <section class="px-8">
                @if($section->title)
                    <h2 class="section-title py-2 text-xl">{{ $section->title }}</h2>
                @endif
                <div class="grid-box flex flex-wrap my-8">
                    @foreach($section->items as $item)
                        <div class="w-1/3">
                            <img src="{{ $item->image->web_url }}" class="p-2" alt="">
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    @endforeach

@endsection
