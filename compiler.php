<?php

    class Generate
    {
        public $file_name = 'cssframework.css';
        public $directory = 'development';
        public $source = array();

        public function __construct()
        {
            $scaned_dir = scandir($this->directory);
            foreach($scaned_dir as $file)
            {
                if(is_file($this->directory . '/' . $file))
                {
                    array_push($this->source, $file);
                }
            }
        }

        public function generate()
        {
            $file_content = array();

            foreach($this->source as $file)
            {
                $file_get_contents = file_get_contents($this->directory . '/' . $file);
                array_push($file_content, $file_get_contents);
            }

            $file_content = implode(' ', $file_content);
            // print_r($file_content);
            $file_put_contents = file_put_contents($this->file_name, $file_content);
            if($file_put_contents)
            {
                echo "Your file $this->file_name has been generated successfuly";
            } else
            {
                exit("There is an error generating your file. Please try again!");
            }
        }
    }

$g = new Generate();
$g->generate();
