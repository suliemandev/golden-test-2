<section class="relative sm:h-screen bg-black flex items-start justify-center text-white flex-col" 
    style="background-size: cover; background-position: center center; background-image: url(/images/slides/4.jpg);">
    <div class="absolute left-0 top-0 h-full w-full bg-black bg-opacity-50"></div>

    <div class="z-10 container mx-auto p-4">
        <div class="font-light text-yellow-500 mt-8">{{ __('EXCLUSIVE') }}</div>
        <h5 class="text-xl sm:text-6xl mt-3 font-extrabold text-start leading-none">{{ __('Rent a Luxury & Sport Car') }}</h5>
        <h6 class="text-lg sm:text-5xl mt-3 font-extrabold text-yellow-500">{{ __('Pay per Hour') }}</h6>
        <p class="text-md sm:text-lg mt-10 max-w-4xl">{{ __('You can now enjoy the amazing experience of driving a sport car and pay per hour! Superior Car Rental provides this service for all tourists & Locals. Please contact us for more information!') }}</p>
        <div class="my-8 rounded-md shadow">
          <a href="/{{ $locale }}/contact" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
            {{ __('Contact') }}
          </a>
        </div>
    </div>
</section>

<section class="bg-black flex flex-col xl:flex-row">

    <div class="flex-1 px-4 xl:ps-24 xl:pe-12 py-6 items-center flex flex-col justify-center">
        <h5 class="text-lg sm:text-3xl font-bold text-white text-center">
            {{ __('Superior Car Rental - Top Sports & Luxury Car Rental Company in UAE.') }}
        </h5>

        <p class="text-gray-600 mt-6">{{ __('Superior Car Rental - About 1') }}</p>

        <p class="text-gray-600 mt-6">{{ __('Superior Car Rental - About 2') }}</p>
    </div>

    <div class="xl:max-w-3xl w-full">
        {{-- <img class="w-full h-full object-cover" src="/images/slides/6.jpg"> --}}
        <iframe class="w-full" style="height: 50vw; max-height: 600px" src="https://www.youtube.com/embed/hoyKpbmPv5w?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 


    </div>
</section>