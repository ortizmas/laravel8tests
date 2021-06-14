<?php

use App\Http\VideoStream;
use Illuminate\Support\Str;
use Iman\Streamer\VideoStreamer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Uploads, Views and Download files Pdf, Docx, Mp4, Mp3
Route::get('/upload', [UploadController::class, 'index'])->name('uploads.index');
Route::get('/upload/create', [UploadController::class, 'create'])->name('uploads.create');
Route::post('/upload', [UploadController::class, 'store'])->name('uploads.store');
Route::get('/download/{file}', [UploadController::class, 'download'])->name('uploads.download');

Route::get('vimeo', [UploadController::class, 'vimeoIndex'])->name('vimeo.index');
Route::post('vimeo', [UploadController::class, 'vimeoUpload'])->name('vimeo.upload');


Route::get('video-stream', function () {
    $filePath = public_path('videos/video-1.mp4');
    $stream = new VideoStream($filePath);
    $stream->start();
});


Route::get('video', function () {
    $path = public_path('videos/video-1.mp4');

    VideoStreamer::streamFile($path);
});

// Route::get('/video/{filename}', function ($filename) {
//     $videosDir = public_path('/videos');; //base_path('resources/assets/videos');
//     $filePath = $videosDir.'/'.$filename;

//     if (file_exists($filePath)) {
//         return abort(404);
//     }

//     $name = basename($filePath);
//     return response()->download($filePath, $name, [
//         'Content-Type' => 'video/mp4',
//     ]);
// });

// Download file
Route::get('/video/{filename}', function ($filename) {
    $videosDir = public_path('/videos');
    $filePath = $videosDir.'/'.$filename;

    if (!file_exists($filePath)) {
        return abort(404);
    }

    $response = new BinaryFileResponse($filePath, 200, [
        'Content-Type' => 'video/mp4',
    ]);

    $name = basename($filePath);
    $response->setContentDisposition('attachment', $name, str_replace('%', '', Str::ascii($name)));

    return $response;
});

Route::get('video/html', function () {
    return view('videos.video');
});

Route::get('/player', function () {
    $video = "/videos/video-1.mp4";
    $mime = "video/mp4";
    $title = "Os Simpsons";

    return view('videos.player')->with(compact('video', 'mime', 'title'));
});

Route::get('/player/{filename}', function ($filename) {
    // Pasta dos videos.
    $videosDir = public_path('/videos');
    $filePath = $videosDir."/".$filename;

    if (file_exists($filePath)) {
        $stream = new VideoStream($filePath);

        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }

    return response("File doesn't exists", 404);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified'
]], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pages', function() {
        return view('admin.pages.index');
    })->name('admin.pages');
});



