@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block object-contain"
            src="{{asset("images/no-image.png")}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{route('listing.show',$listing)}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot mr-2"></i>{{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
