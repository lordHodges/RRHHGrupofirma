<?php
defined('BASEPATH') || exit('No direct script access allowed');

// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once APPPATH . "libraries/third_party/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class pdfgenerator
{


    public function generate($html, $filename = '', $stream = TRUE, $paper = 'legal', $orientation = "portrait", $download)
    {
        VAR_DUMP(APPPATH . "libraries/third_party/dompdf/autoload.inc.php");
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
		if (ob_get_length()){
		ob_end_clean();
		}
            $dompdf->stream($filename.".pdf", array("Attachment" => $download));
        } else {
            return $dompdf->output();
        }
    }
}
