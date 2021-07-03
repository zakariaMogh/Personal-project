<?php


namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $name = $filename ?? Str::random(25). '.' . $file->getClientOriginalExtension();

        return $file->storeAs(
                $folder,
                $name ,
                $disk
            );
    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = 'public'): void
    {
        Storage::disk($disk)->delete($path);
    }
}
