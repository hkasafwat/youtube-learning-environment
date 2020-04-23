@extends('layouts.app')

@section('userPlaylists')

<Card
    thumbnail="{{ $playlist[0]["thumbnail"] }}"
    title="{{ $playlist[0]["title"] }}"
    description="{{ $playlist[0]["description"] }}"
    date="{{ $playlist[0]["publish_date"] }}"
    ></Card>

@endsection