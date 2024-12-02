<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class UploadController extends Controller
{

    public function index()
    {
        $uploads = Upload::orderBy('created_at')->get();
        return view('upload.index', compact('uploads'));
    }

    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $file = $request->file('file');
            $nombreOriginal = $file->getClientOriginalName();
            $nombreOculto = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $nombreOriginal;
            $path = 'ejercicio/' . $nombreOculto;
            if (!$file) {
                dd('No file uploaded.');
            }
            if (!Storage::disk('private')->exists('')) {
                dd('Private disk not accessible.');
            }
            try {
                $stored = Storage::disk('private')->putFileAs('ejercicio', $file, $nombreOculto);
                if (!$stored) {
                    dd('Failed to store file.');
                }
            } catch (\Exception $e) {
                dd('Error: ' . $e->getMessage());
            }

            Upload::create([
                'nombre_original' => $nombreOriginal,
                'nombre_oculto' => $nombreOculto,
                'path' => $path,
            ]);

            return redirect()->route('upload.index')->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'File upload failed: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $upload = Upload::findOrFail($id);
        return view('upload.show', compact('upload'));
    }

      
    public function view(Upload $photo)
    {
        try {
            $path = storage_path('app/private/' . $photo->path);
    
            if (!file_exists($path)) {
                abort(404, 'File not found.');
            }
    
            $file = file_get_contents($path);
            $type = mime_content_type($path);
    
            return response($file, 200)->header('Content-Type', $type);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
