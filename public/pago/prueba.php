<?php
// URL de la API a la que deseas hacer la publicación
        $url = 'https://app.form.phoenixtechsa.com/api/payment-membresia';
        $hash=11212;
        // los datos que deseas enviar en la publicación
        $data = array(
            'payment' => '100', 
            'user_id' => '15',
            'verificado'=>1,
            'membresia_id'=>6,
            'referencia'=>$hash
        );

        // inicializar una sesión cURL
        $ch = curl_init($url);

        // establecer las opciones de la sesión cURL
        curl_setopt($ch, CURLOPT_POST, 1); // hacer una publicación
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // establecer los datos a publicar
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // recibir la respuesta como una cadena

        // ejecutar la sesión cURL
        $response = curl_exec($ch);
        echo(json_encode($response));

        // cerrar la sesión cURL
        curl_close($ch);