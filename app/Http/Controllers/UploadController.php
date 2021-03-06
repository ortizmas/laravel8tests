<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;
use Youtube;

class UploadController extends Controller
{
    protected $client;

    public function __construct() {
        $this->client = new Vimeo(env('VIMEO_CLIENT'), env('VIMEO_SECRET'), env('VIMEO_ACCESS'));
    }

    public function index()
    {
        $uploads = Upload::all();
        return view('uploads.index', compact('uploads'));
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        $data = new Upload();

        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('uploads', $filename);

        $data->name = $request->name;
        $data->file = $filename;
        $data->save();

        return redirect()->route('uploads.index');
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('uploads/' . $file));
    }

    public function vimeoIndex()
    {
        //dd(phpinfo());
       $videos = Vimeo::request('/me/videos', ['per_page' => 10], 'GET');

       return view('uploads.vimeo', compact('videos'));
    }

    public function vimeoUpload(Request $request) {
        if ($request->hasFile('file')) {
            $response = Vimeo::upload($request->file, [
                "name" => $request->file->getClientOriginalName(),
                'privacy' => [
                    'view' => 'anybody'
                ]
            ]);
        }

        return redirect()->back();
    }

    public function youtubeIndex()
    {
       // $videos = Youtube::exists('b6JR-GOhAto');
       $videos = Youtube::getVideo('Video 2','public', 'b6JR-GOhAto');
       dd($videos);

       return view('uploads.youtube', compact('videos'));
    }

    public function youtubeUpload(Request $request) {
        // $file = $request->file('video');
        // $file->getRealPath()
        // dd($file->getPathName());
        if ($request->hasFile('file')) {
            $video = Youtube::upload($request->file('video')->getPathName(), [
                'title'       => $request->input('title'),
                'description' => $request->input('description')
            ]);

            return redirect()->back()->with('success', "Video uploaded successfully. Video ID is ". $video->getVideoId());
        }

        return redirect()->back()->with('error', 'Error ocurred!');
    }
}
