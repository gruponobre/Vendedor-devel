<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;


  

class ImageUploadController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUpload()

    {


    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost(Request $request)

    {
        //Cria uma copia da imagem que vem do request e salva no banco
        $img = \Image::make($request->file('imgInp')->getRealpath());
        $img->resize(200, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $location = public_path('images/profile-images/');

        //A imagem é salva de acordo com o codigo do funcionário para manter uma imagem por funcionário no banco.
        $imageName = $request->session()->get('codifunc').'.jpg';
        $img->save($location . $imageName);

        $imgExtensao = $request->imgInp->extension();
      
        //Ve qual a orientação da imagem que veio no request, corrige se estiver errado e sobreescreve a imagem errada.
        if (function_exists('exif_read_data') && $imgExtensao != "png") {
            $exif = exif_read_data($request->file('imgInp'));
            if($exif && isset($exif['Orientation'])) {
              $orientation = $exif['Orientation'];
              if($orientation != 1){
                $img = imagecreatefromjpeg($request->file('imgInp'));
                $deg = 0;
                switch ($orientation) {
                  case 3:
                    $deg = 180;
                    break;
                  case 6:
                    $deg = 270;
                    break;
                  case 8:
                    $deg = 90;
                    break;
                }
                if ($deg) {
                  $img = imagerotate($img, $deg, 0);        
                }
                // Reescreve a imagem antiga pela nova
                $image = Image::make($img);
                $image->resize(200, null, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upsize();
                });
                imagejpeg($image, $imageName, 95);
              }
            }
          } 
        return redirect()->back();
    }
}
