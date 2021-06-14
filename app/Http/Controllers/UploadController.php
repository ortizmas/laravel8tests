<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;

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
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "https://www.howsmyssl.com/a/check");
        // curl_setopt($ch, CURLOPT_SSLVERSION, 6); // This enforces TLS 1.2
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // $tlsVer = json_decode($response, true);
        // echo "<h1>Your TSL version is: <u>" . ( $tlsVer['tls_version'] ? $tlsVer['tls_version'] : 'no TLS support' ) . "</u></h1>";
        // die();
        //dd(phpinfo());
       $videos = []; // Vimeo::request('/me/videos', ['per_page' => 10], 'GET');

       return view('uploads.vimeo', compact('videos'));
    }

    public function vimeoUpload(Request $request) {
        if ($request->hasFile('file')) {
            $response = Vimeo::upload($request->file);
        }

        return redirect()->back();
    }
}
