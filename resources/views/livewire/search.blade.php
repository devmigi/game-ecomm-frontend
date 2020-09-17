
<div class="relative flex-1 flex text-gray-600 focus-within:text-gray-400 lg:max-w-xl lg:mt-0 mt-4 order-last lg:order-none">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button class="p-1 focus:outline-none focus:shadow-outline">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </button>
        </span>
    <input type="text" wire:model.debounce.500ms="query" class="py-3 lg:py-2 flex-1 text-sm text-white bg-white rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-700" placeholder="Search Games, Consoles and more.." autocomplete="off">


    <div class="absolute bg-white w-full z-10" style="top: 38px;">
        @foreach($products as $product)
            <a href="/{{ $product->slug }}">
                <div class="py-1 text-gray-900 px-4 py-2 hover:bg-gray-100" style="border-bottom: 1px solid #f8f8f8">
                    {{ $product->name }}
                </div>
            </a>
        @endforeach

        @if($query && count($products) < 1)
            <div class="py-1 text-gray-500 px-4 py-3 shadow-md rounded">
                No Results Found!
            </div>
        @endif
    </div>


</div>