<?php 

class Log
{
    public function Write($strFileName,$strData)
    {
        if(!is_writable($strFileName))
        {
            die('Change your CHMOD permission to '.$strFileName);
        }

        $handle = fopen($strFileName, 'a+');

        fwrite($handle,$strData."\r");
        fclose($handle);


    }

    public function Read($strFileName)
    {
       $handle = fopen($strFileName, 'r');
       file_get_contents($strFileName);

    }

}
?>