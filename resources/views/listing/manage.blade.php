<?php

use App\Models\Listing;

/** @var $listing Listing */
?>
<x-layout>
    @include('partials._search')
        <x-card>
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                @foreach($listings as $listing)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="{{route('listing.show',$listing)}}">
                                {{$listing->title}}
                            </a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="{{route('listing.edit',$listing)}}"
                               class="text-blue-400 px-6 py-2 rounded-xl">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form action="{{route('listing.destroy',$listing)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="text-red-600">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <script>
                document.getElementById('delete').addEventListener('click', e => {
                    e.preventDefault()
                    if (!confirm('Are you sure?')) {
                        return
                    }
                    let form = e.target.closest('form')
                    form.submit()
                })
            </script>
            <div class="mt-6 p-4">
                {{$listings->links()}}
            </div>
        </x-card>

</x-layout>

