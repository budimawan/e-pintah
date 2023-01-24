<?php
 
class Pdfgenerator
{
  // use Dompdf\Dompdf;
  // use Dompdf\Options;
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    // define('DOMPDF_ENABLE_REMOTE', false);
    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
 
    $dompdf = new DOMPDF();
    $dompdf = new Dompdf(array('enable_remote' => true));
    $dompdf->set_option('enable_html5_parser', TRUE);
        $paper_size = 'leter';
		    $orientation = 'landscape';
	  $dompdf->set_paper($paper_size, $orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}