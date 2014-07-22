<?php

namespace app\project1\service;

class FileService
{
   /**
     * Determine Orientation of File
     *
     * @param String $file
     * @return String
     */
    public function getOrientation($file) 
    {
        list($width, $height) = getimagesize($file);
        if($width > $height) {
            $orientation='landscape';
        } else {
            $orientation='portrait';
        }
        return $orientation;
    }

    /**
     * Delete a File from Server
     *
     * @param String $file
     * @return Boolean
     */
    public function deleteFiles($file)
    {
        if(file_exists($file)) {
            unlink($file);
            return true;
        }
    }
    
    /**
     * Determine the Files True Resolution Intent
     * 
     * @param String $file
     * @return String
     */
    public function getImageResolution($file)
    {
        $data = exec("identify -format '%x x %y' $file",$output,$return);
        preg_match_all('!\d+!', $data, $matches);
        
        return $matches[0][0];
    }
    
    /**
     * Determine the number of pages on the PDF
     *
     * @param String $pdf_file
     * @return Integer
     */
    public function numPdfPages($file)
    {
        $count = exec('/usr/bin/pdfinfo '.$file.' | awk \'/Pages/ {print $2}\'', $output);
        return $count;
    }
}
