<?php

class Lister extends Controller
{
    public function index()
    {
        echo "Lister/Index";
    }

    public function listing()
    {
        $title = $this->model('test');
        $data['title'] = $title->data();

        $this->view('title-list', $data);
    }
}

?>