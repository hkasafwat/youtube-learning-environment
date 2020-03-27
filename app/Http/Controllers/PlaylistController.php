<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaylistController extends Controller
{
    public $api_key = 'AIzaSyBnjflFKz4R-DhcwNIbxJ8ioOeIHdrTWns';
    public $api_url = 'https://www.googleapis.com/youtube/v3/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function show(Playlists $playlists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlists $playlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlists $playlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlists $playlists)
    {
        //
    }

    public function getPlaylistInfo() {
        $playlist;
        $playlist_id = 'PLpcSpRrAaOaoIqHQddZOdbRrzr5dJtgSs';
        
        $playlistPlayer = Http::get($this->api_url . 'playlists?part=player&id=' . $playlist_id . '&key=' . $this->api_key);
        $playlistSnippet = Http::get($this->api_url . 'playlists?part=snippet&part=player&id=' . $playlist_id . '&key=' . $this->api_key);

        $playlistPlayerJson = $playlistPlayer->json();
        $playlistSnippetJson = $playlistSnippet->json();

        $playlist['publishDate'] = $playlistSnippetJson['items'][0]['snippet']['publishedAt'];
        $playlist['e_tag'] = $playlistPlayerJson['items'][0]['etag'];
        $playlist['title'] = $playlistSnippetJson['items'][0]['snippet']['title'];
        $playlist['description'] = $playlistSnippetJson['items'][0]['snippet']['description'];
        $playlist['thumbnail'] = $playlistSnippetJson['items'][0]['snippet']['thumbnails']['maxres']['url'];
        $playlist['player_iframe'] = $playlistPlayerJson['items'][0]['player']['embedHtml'];
        $playlist['channelTitle'] = $playlistSnippetJson['items'][0]['snippet']['channelTitle'];

        dump($playlist);
    }

    
}
