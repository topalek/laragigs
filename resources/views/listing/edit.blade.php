<?php

use App\Models\Listing;

/** @var $listing Listing */
?>
<x-layout>
{{--    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>--}}
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <x-card class="max-w-lg mx-auto mt-24 p-10">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Gig
            </h2>
            <p class="mb-4">Edit: {{$listing->title}}</p>
        </header>

        <form method="post" action="{{route('listing.update',$listing)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{old('company',$listing->company)}}"
                />
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{old('title',$listing->title)}}"
                />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{old('location',$listing->location)}}"
                />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{old('email',$listing->email)}}"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="url"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{old('website',$listing->website)}}"
                />
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{old('tags',$listing->tags)}}"
                />
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"

                />
                <img
                    class="w-48 mr-6 mb-6  object-contain"
                    src="{{$listing->logo ? asset("storage/".$listing->logo) : asset("images/no-image.png")}}"
                    alt=""
                />
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{old('description',$listing->description)}}
                </textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
        <script>
            CKEDITOR.replace( 'description',{
                allowedContent:true
            } );
        </script>
    </x-card>
</x-layout>
