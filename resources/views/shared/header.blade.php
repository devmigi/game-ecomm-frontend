<nav class="flex items-center justify-between flex-wrap bg-gray-100 p-6" x-data="{isOpen : false}">
    <div class="flex items-center flex-shrink-0 text-gray mr-6">
        <img src="/images/logo-text.png" class="h-8" alt="Gamelelo">
    </div>
    <div class="block md:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-900 border-teal-400 hover:text-gray hover:border-gray" @click="isOpen = !isOpen">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>
    <div class="w-full hidden md:block flex-grow md:flex md:items-center md:w-auto" :class="{ 'hidden': !isOpen }" >
        <div class="text-sm md:flex-grow">

        </div>
        <div>
            <a href="#" class="block mt-4 md:inline-block md:mt-0 mr-4">
                Docs
            </a>
            <a href="#" class="block mt-4 md:inline-block md:mt-0 mr-4">
                Examples
            </a>
            <a href="#" class="block mt-4 md:inline-block md:mt-0 mr-4">
                Blog
            </a>
            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-gray border-gray hover:border-transparent hover:text-teal-500 hover:bg-gray mt-4 md:mt-0">Download</a>
        </div>
    </div>
</nav>