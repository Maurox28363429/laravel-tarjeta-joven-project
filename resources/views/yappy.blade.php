<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>

</head>
<body>
<script type="text/javascript">
const API_KEY = '24ff017d-cda9-4e25-84f9-7a77a74ea14c';
const API_SECRET = 'QkdfbUpSeHgwZWhFUWI5ZXMyVDZ2bGQubjg0ZUwxTVJzZDMyRFlCelJsZjg2WVg5WUpGNHZDV0NrRE54WkxtWA==';

// la información de la transacción que quieres hacer
const transaction = {
  amount: 100.00,
  currency: 'USD',
  description: 'Pago de servicio',
  success_url: 'https://app.form.phoenixtechsa.com/pago-exitoso',
  cancel_url: 'https://app.form.phoenixtechsa.com/pago-cancelado'
};

// configuración para hacer la solicitud POST
const config = {
  headers: {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${API_KEY}:${API_SECRET}`
  }
};

// hacer la solicitud POST a la API de Yappy
axios.post('https://api.yappy.com/v1/payment-links', transaction, config)
  .then(response => {
    const link = response.data.link;
    // hacer algo con el link de pago (por ejemplo, mostrarlo en pantalla)
    console.log(link);
  })
  .catch(error => {
    // manejar errores
    console.error(error);
  });
</script>
</body>
</html>