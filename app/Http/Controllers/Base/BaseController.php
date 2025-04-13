<?php

namespace App\Http\Controllers\Base;

use Illuminate\Routing\Controller;
use Illuminate\Http\UploadedFile;

abstract class BaseController extends Controller
{
    protected function redirectSuccess(string $route, string $message)
    {
        return redirect()->route($route)->with('success', $message);
    }

    protected function redirectError(string $route, string $message)
    {
        return redirect()->route($route)->with('error', $message);
    }

    protected function view(string $blade, array $data = [])
    {
        return view($blade, $data);
    }

    protected function storeFile(?UploadedFile $file, string $path = 'uploads'): ?string
    {
        return $file ? $file->store($path, 'public') : null;
    }

    protected function mapToDTO(array $validated, array $extras = []): object
    {
        $dtoClass = $this->dtoClass();

        return $dtoClass::fromArray(array_merge($validated, $extras));

    }

    abstract protected function dtoClass(): string;

}
