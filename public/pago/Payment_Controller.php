<?php
// $file = fopen("archivo.txt", "w") or die("No se puede abrir el archivo.");
// $txt = json_encode($_GET);
// fwrite($file, $txt);
// fclose($file);
// URL de la API a la que deseas hacer la publicación
// $url = 'https://api.tarjetajovendiamante.com/api/payment-membresia';

// // los datos que deseas enviar en la publicación
// $data = array(
//     'payment' => '9.99', 
//     'user_id' => $_GET['orderId'],
//     'membresia_id'=>6,
//     'referencia'=>"yappy_success"
// );

// // inicializar una sesión cURL
// $ch = curl_init($url);

// // establecer las opciones de la sesión cURL
// curl_setopt($ch, CURLOPT_POST, 1); // hacer una publicación
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // establecer los datos a publicar
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // recibir la respuesta como una cadena

// // ejecutar la sesión cURL
// $response = json_decode(
//     curl_exec($ch)
// );
// $orderId=$response->id;
// //echo(json_encode($response));
// // cerrar la sesión cURL
// curl_close($ch);
// Importar archivo .env
$ID_DEL_COMERCIO="0932fb2c-4bc6-4568-9d34-b49d69f4dd53";
$CLAVE_SECRETA="QkdfbUJxdXkzNklFcWd2ZnpBMWJJTU4uaWZRdjlvTGRQdE9OeUt0N1E3Y3prOGliRVlKcG5Bb2FodkxKaTlIMg==";
$MODO_DE_PRUEBAS=true;
$YAPPY_PLUGIN_VERSION="P1.0.0";

// IMPORTAR ARCHIVO BgFirma.php
include 'src/BgFirma.php';

use Bg\BgFirma;

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$domain = $protocol . $_SERVER['HTTP_HOST'];

// verificar credenciales
$response = BgFirma::checkCredentials($ID_DEL_COMERCIO, $CLAVE_SECRETA, $domain);

if ($response && $response['success']) {
    // // URL de la API a la que deseas hacer la publicación
    // $url = "https://api.tarjetajovendiamante.com/api/payment-membresia/changes/".$orderId;

    // // los datos que deseas enviar en la publicación
    // $data = array(
    //     "verificado"=>1
    // );
    // // inicializar una sesión cURL
    // $ch = curl_init($url);

    // // establecer las opciones de la sesión cURL
    // curl_setopt($ch, CURLOPT_POST, 1); // hacer una publicación
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // establecer los datos a publicar
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // recibir la respuesta como una cadena

    // // ejecutar la sesión cURL
    // $response = curl_exec($ch);
    // //echo(json_encode($response));
    // // cerrar la sesión cURL
    // curl_close($ch);
    // Inicializar objeto para poder generar el hash
    $bg = new BgFirma(
        9.99,
        $ID_DEL_COMERCIO,
        'USD',
        9.90,
        0.09,
        $response['unixTimestamp'],
        'YAP',
        'VEN',
        $_GET['orderId'],
        "https://app.tarjetajovendiamante.com/",
        'https://app.tarjetajovendiamante.com/',
        $domain,
        $CLAVE_SECRETA,
        $MODO_DE_PRUEBAS,
        $response['accessToken'],
        ''
    );
    $response = $bg->createHash();
    if ($response['success']) {
        /**
         * Al verificar si se creó con éxito el hash, podremos obtener el url de la siguiente manera
         * @var response contiente los valores
         * @var response['url'] = contiene el url a redireccionar para continuar con el pago.
         */
        $url = $response['url'];
        echo "
            <script type=\"text/javascript\">
            window.location.replace(\"$url\");
            </script>
        ";
    } else {
        /**
         * Aquí es donde se mostrarán los errores generados por
         * cualquier tipo de validación de campos necesarios para realizar la transacción.
         * @var response contiene los valores
         * @var response['msg'] = contiene el mensaje de error a mostrar
         * @var response['class'] = contiene la clase de error que es, pueden ser: alert (amarillo), invalid (rojo)
         */
        $bg->showAlertError($response);
    }
} else {
    echo '<style>';
    include 'main.css';
    echo '</style>';
    echo "<div class='alert'>Algo salió mal. Contacta con el administrador</div>";
}