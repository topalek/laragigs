<h1>{{$heading}}</h1>

@forelse ($listings as $listing)
    <h2>{{ $listing->title }}</h2>
    <p>{{ $listing->description }}</p>
@empty
    <p>No listings found</p>
@endforelse
