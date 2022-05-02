<?php

use App\Models\Listing;

/** @var $listing Listing */
?>
<x-layout>
    @include('partials._search')
    <a href="{{route('listing.index')}}" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6  object-contain"
                    src="{{$listing->logo ? asset("storage/".$listing->logo) : asset("images/no-image.png")}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-tags :tagsCsv="$listing->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot mr-2 "></i>{{$listing->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div class="w-full">
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{$listing->description}}
                        </p>
                        <div class="flex gap-2">
                            <a
                                href="mailto:{{$listing->email}}"
                                class="block flex-auto bg-laravel text-white w-1/2 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >

                            <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block flex-auto w-1/2 bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>

                    </div>
                </div>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="{{route('listing.edit',$listing)}}">
                <i class="fa-solid fa-pencil mr-2"></i>Edit
            </a>
        </x-card>
    </div>
</x-layout>
