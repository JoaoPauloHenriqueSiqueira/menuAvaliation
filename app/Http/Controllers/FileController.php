<?php
 
namespace App\Http\Controllers;

use App\Library\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class FileController extends Controller
{

    private $upload;

    public function __construct(Upload $upload){
        $this->upload = $upload;
    }

    public function index()
    {
        return view('file');
    }
 
    public function store(Request $request)
    {
        $this->upload->upload($request->file('profile_image'),'teste');
        // if($request->hasFile('profile_image')) {
  
        //     //get filename with extension
        //     $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
      
        //     //get filename without extension
        //     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
        //     //get file extension
        //     $extension = $request->file('profile_image')->getClientOriginalExtension();
      
        //     //filename to store
        //     $filenametostore = $filename.'_'.time().'.'.$extension;
      
        //     //Upload File to s3
        //     Storage::disk('s3')->put($filenametostore, fopen($request->file('profile_image'), 'r+'), 'public');
      
        //     //Store $filenametostore in the database
 
        //     return redirect('upload')->with('success', 'File uploaded successfully.');


        }
    
}