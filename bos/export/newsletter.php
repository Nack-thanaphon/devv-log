<?php




include('../../database/connect.php');

require_once('../plugins/vendor/autoload.php');



use Dompdf\Dompdf;


if (isset($_GET["id"])) {
    $stmt =  $conn->prepare("SELECT * FROM tbl_newsletter WHERE id = '" . $_GET["id"] . "'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <style>
                @import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap");

                
             
* {
  
    font-family: "IBM Plex Sans Thai", sans-serif !important;

}
                </style>                
                ';

    foreach ($result as $row) {
        $html .= '<body><div>' . $row["n_detail"] . '</div>';
        $name = 'Newsletter' . $row["n_title"] . '.pdf';
    }

    $html .= '</body></html>';

    $dompdf = new Dompdf();
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream($name, ['Attachment' => 0]);
}