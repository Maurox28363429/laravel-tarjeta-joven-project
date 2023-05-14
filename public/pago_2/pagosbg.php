<?php
$file = fopen("pago.txt", "w") or die("No se puede abrir el archivo.");
$txt = json_encode($_GET).json_encode($_POST);
fwrite($file, $txt);
fclose($file);

// URL de la API a la que deseas hacer la publicación
$url = "https://app.form.phoenixtechsa.com/api/payment-membresia/changes/".$_GET['orderid'];

// los datos que deseas enviar en la publicación
$data = array(
    "verificado"=>1
);
// inicializar una sesión cURL
$ch = curl_init($url);

// establecer las opciones de la sesión cURL
curl_setopt($ch, CURLOPT_POST, 1); // hacer una publicación
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // establecer los datos a publicar
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // recibir la respuesta como una cadena

// ejecutar la sesión cURL
$response = curl_exec($ch);
//echo(json_encode($response));
// cerrar la sesión cURL
curl_close($ch);
echo "
        <script type=\"text/javascript\">
        window.location.replace(\"http://app.tarjetajovendiamante.com/\");
        </script>
    ";
