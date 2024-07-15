<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use CodeIgniter\HTTP\ResponseInterface;

class FileController extends BaseController
{
    public static function get_path($filename){
        return WRITEPATH . 'uploads/images/' . $filename;
    }
    public function serve($filename){
        $file_path = $this::get_path($filename);

        if(!file_exists($file_path)){
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND, 'File not found');
        }

        $file_info = new File($file_path);
        $mime_type = $file_info->getMimeType();

        return $this->response
                    ->setHeader('Content-Type', $mime_type)
                    ->setBody(file_get_contents($file_path));
    }
}