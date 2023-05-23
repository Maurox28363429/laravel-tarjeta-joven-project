<?php
// $file = fopen("pago.txt", "w") or die("No se puede abrir el archivo.");
// $txt = json_encode($_GET);
// fwrite($file, $txt);
// fclose($file);
// function validateHash()
// {
//     try {
//         $ID_DEL_COMERCIO="0932fb2c-4bc6-4568-9d34-b49d69f4dd53";
//         $CLAVE_SECRETA="QkdfbUJxdXkzNklFcWd2ZnpBMWJJTU4uaWZRdjlvTGRQdE9OeUt0N1E3Y3prOGliRVlKcG5Bb2FodkxKaTlIMg==";
//         $MODO_DE_PRUEBAS=false;
//         $YAPPY_PLUGIN_VERSION="P1.0.0";
//         $orderId = $_GET['orderId'];
//         $status = $_GET['status'];
//         $hash = $_GET['hash'];
//         $domain = $_GET['domain'];
//         $values = base64_decode($CLAVE_SECRETA);
//         $secrete = explode('.', $values);
//         $signature =  hash_hmac('sha256', $orderId . $status . $domain, $secrete[0]);
//         $success = strcmp($hash, $signature) === 0;
//     } catch (\Throwable $th) {
//         $success = false;
//     }
//     return $success;
// }


// if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
//     header('Content-Type: application/json');
//     $success = validateHash();
//     if ($success) {
//         // Si es true, se debe cambiar el estado de la orden en la base de datos
//         // URL de la API a la que deseas hacer la publicación
//         $url = "https://app.form.phoenixtechsa.com/api/payment-membresia/changes/"+$_GET["orderId"];

//         // los datos que deseas enviar en la publicación
//         $data = array();

//         // inicializar una sesión cURL
//         $ch = curl_init($url);

//         // establecer las opciones de la sesión cURL
//         curl_setopt($ch, CURLOPT_POST, 1); // hacer una publicación
//         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // establecer los datos a publicar
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // recibir la respuesta como una cadena

//         // ejecutar la sesión cURL
//         $response = curl_exec($ch);
//         //echo(json_encode($response));
//         // cerrar la sesión cURL
//         curl_close($ch);

    
//     }
//     echo json_encode(['succes' => $success]);
// }


// $file = fopen("pago.txt", "w") or die("No se puede abrir el archivo.");
// $txt = json_encode($_GET).json_encode($_POST);
// fwrite($file, $txt);
// fclose($file);

// // URL de la API a la que deseas hacer la publicación
// $url = "https://api.tarjetajovendiamante.com/api/payment-membresia/changes/".$_GET['orderid'];

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
echo "
        <script type=\"text/javascript\">
        window.location.replace(\"http://app.tarjetajovendiamante.com/\");
        </script>
    ";
