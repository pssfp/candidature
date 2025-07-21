<?php
use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_lib
{
    public $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $this->dompdf = new Dompdf($options);
    }

    public function loadHtml($html)
    {
        $this->dompdf->loadHtml($html);
    }

    public function setPaper($size = 'A4', $orientation = 'portrait')
    {
        $this->dompdf->setPaper($size, $orientation);
    }

    public function render()
    {
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf", $attachment = true)
    {
        $this->dompdf->stream($filename, array("Attachment" => $attachment));
    }

    public function output()
    {
        return $this->dompdf->output();
    }
}
