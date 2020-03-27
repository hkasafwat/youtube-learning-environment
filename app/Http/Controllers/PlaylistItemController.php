<?php

namespace App\Http\Controllers;

use App\PlaylistItem;
use Illuminate\Http\Request;

class PlaylistItemController extends Controller
{
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
     * @param  \App\PlaylistItem  $playlistItem
     * @return \Illuminate\Http\Response
     */
    public function show(PlaylistItem $playlistItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlaylistItem  $playlistItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaylistItem $playlistItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlaylistItem  $playlistItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaylistItem $playlistItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlaylistItem  $playlistItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaylistItem $playlistItem)
    {
        //
    }

    public function getPlaylistItems() {
        $playlist_id = 'PLpcSpRrAaOaoIqHQddZOdbRrzr5dJtgSs';

        $response = Http::get($this->api_url . 'playlistItems?part=snippet&maxResults=50&playlistId=' . $playlist_id . '&key=' . $this->api_key);

        $json_response = $response->json();

        $playlist_items = $json_response['items'];

        dump($playlist_items);
    }
}
