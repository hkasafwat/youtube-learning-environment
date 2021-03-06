<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public $api_key;
    public $api_url;    

    public function __construct() {
        $this->api_key = config('services.youtube.key');
        $this->api_url = 'https://www.googleapis.com/youtube/v3/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $item = $user->playlists()->get();
        
        return view('userPlaylists', ['playlist' => $item]);
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
        $playlist_id = 'PLpcSpRrAaOaoIqHQddZOdbRrzr5dJtgSs';

        $playlistInfo = $this->getPlaylistInfo($playlist_id);

        $playlist = new Playlist;

        $playlist->user_id = Auth::user()->id;
        $playlist->publish_date = date("Y-m-d H:i:s", strtotime($playlistInfo['publishDate']));
        $playlist->playlist_id = $playlist_id;
        $playlist->e_tag = $playlistInfo['e_tag'];
        $playlist->title = $playlistInfo['title'];
        $playlist->description = $playlistInfo['description'];
        $playlist->thumbnail = $playlistInfo['thumbnail'];
        $playlist->video_iframe = $playlistInfo['video_iframe'];
        $playlist->channel_title = $playlistInfo['channelTitle'];

        $playlist->save();
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

    public function getPlaylistInfo($id) {
        $playlist;
        
        $playlistPlayer = Http::get($this->api_url . 'playlists?part=player&id=' . $id . '&key=' . $this->api_key);
        $playlistSnippet = Http::get($this->api_url . 'playlists?part=snippet&part=player&id=' . $id . '&key=' . $this->api_key);

        $playlistPlayerJson = $playlistPlayer->json();
        $playlistSnippetJson = $playlistSnippet->json();

        $playlist['publishDate'] = $playlistSnippetJson['items'][0]['snippet']['publishedAt'];
        $playlist['e_tag'] = $playlistPlayerJson['items'][0]['etag'];
        $playlist['title'] = $playlistSnippetJson['items'][0]['snippet']['title'];
        $playlist['description'] = $playlistSnippetJson['items'][0]['snippet']['description'];
        $playlist['thumbnail'] = $playlistSnippetJson['items'][0]['snippet']['thumbnails']['maxres']['url'];
        $playlist['video_iframe'] = $playlistPlayerJson['items'][0]['player']['embedHtml'];
        $playlist['channelTitle'] = $playlistSnippetJson['items'][0]['snippet']['channelTitle'];

        return $playlist;
    }

    
}
