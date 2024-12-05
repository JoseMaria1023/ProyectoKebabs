<?php 
require '../vendor/autoload.php';
use Dompdf\Dompdf;

require_once '../cargadores/autocargadores.php';

ob_end_clean();

class DescargarPdf {
    public function generarPdfKebabs() {
        $repoKebabs = new RepoKebabs();
        
        $kebabs = $repoKebabs->getKebabs();

        $dompdf = new Dompdf();

        $html = '
        <html>
        <head>
            <title>Menú de la Casa</title>
        </head>
        <body>
            <h1>Menú de la Casa</h1>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Ingredientes</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($kebabs as $kebab) {
            $html .= '<tr>
                        <td>' . $kebab['nombre'] . '</td>
                        <td>' . $kebab['descripcion'] . '</td>
                        <td>' . $kebab['precio_base'] . ' €</td>
                        <td>';

            if (!empty($kebab['ingredientes'])) {
                $html .= implode(", ", $kebab['ingredientes']);
            }

            $html .= '</td>
                    </tr>';
        }

        $html .= '</tbody></table></body></html>';

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("Menu_de_Kebabs.pdf", ["Attachment" => true]);
    }
}

$descargarPdf = new DescargarPdf();
$descargarPdf->generarPdfKebabs();
?>
