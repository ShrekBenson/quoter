<?php

namespace App\Livewire\Assets;

use App\Models\Asset;
use Livewire\Component;

class CreateAsset extends Component
{
    public function store(Request $request)
    {
        //validación de campos requeridos
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'video_path' => 'required|mimes:mp4'
        ]);


        $asset = new Asset();
        $asset->title = $request->input('title');
        //Subida de la miniatura
        $image = $request->file('image');
        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            Storage::disk('images')->put($image_path, File::get($image));
            $asset->image = $image_path;
        }
        //Subida del video
        $video_file = $request->file('video_path');
        if ($video_file) {
            $video_path = time() . $video_file->getClientOriginalName();
            Storage::disk('videos')->put($video_path, File::get($video_file));
            $asset->video_path = $video_path;
        }
        $asset->save();
        return redirect()->route('asset.index')->with(array(
            'message' => 'El asset se ha subido correctamente'
        ));
    }


    public function render()
    {
        return view('livewire.assets.create-asset');
    }
}
