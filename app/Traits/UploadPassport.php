<?php


namespace App\Traits;


trait UploadPassport
{
    /**
     * @param $request
     * @param $path
     * @param null $user
     * @return mixed
     */
    private function hasImage($request, $path, $user = null)
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,PNG,JPG,JPEG|max:50',
        ]);

        if ($user) {
            //rename the file
            $name = $user->phone.'_'.$request->first_name.'_'.$request->last_name. '.' . $request->image->getClientOriginalExtension();
//            // delete old image
//            $user->deleteFile();
        } else {
            $name = $request->phone.'_'.$request->first_name. '.' . $request->image->getClientOriginalExtension();

        }

        return $request->image->storeAs($path, $name);     // upload it


    }
}
