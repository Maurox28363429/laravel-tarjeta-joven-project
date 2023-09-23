<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regional de seguros</title>
    <style>
        ul {
            list-style-type: circle; /* cambia el tipo de viñeta a círculos */
        }
        li {
            list-style-type: disc;
        }
        body {
            font-family: "Arial Paneuropean Bold", "Arial-BoldMT", sans-serif;
        }
        td,th{
            padding:0.5em;
        }
    </style>
</head>
<body>
    <img src='https://tarjetajovenapi.phoenixtechsa.com/logo_regional_seguros.png' style="width:150px"/>
    <h5 style="font-weight:bold;margin-bottom:-0.1em">CERTIFICADO DE COBERTURA Y CONDICIONES PARTICULARES</h5>
    <hr>
    <div style="text-align:right">
        {{date('d/m/Y')}}
    </div>
    <div style="margin:1em 0;font-size:1.1em">
        Número de Póliza: 10-09-2000276-{{$user["consecutivo"]}}
    </div>
    <div style="margin:1em 0;font-size:1.1em">
        Estimado(a) <b>{{$user['name'].' '.$user['last_name']}}</b>
    </div>
    <div style="margin:1em 0; font-size:1em">
        <b> BIENVENIDOS A LA REGIONAL DE SEGUROS</b>
    </div>
    <div style="">
        Le agradecemos por habernos seleccionado, nos complace compartirle su póliza de accidentes
        personales. Valoramos mucho la confianza depositada en nosotros y le damos la bienvenida al
        selecto grupo de clientes que reciben nuestro servicio VIP. 
        <br><br>
        Junto con esta carta, usted podrá encontrar los siguientes documentos referentes a su póliza de
        seguro de médico:
    </div>
    <div style="margin:0.5em 0;font-size:1em">
        <b>
            <ul>
                <li>
                    Certificado de Cobertura
                </li>
                <li>
                    Condiciones Particulares 
                </li>
            </ul>
        </b>
    </div>
    <div style="margin:0.5em 0;font-size:1em">
        Le recordamos que usted dispone de un período de 15 días hábiles para revisar estos
        documentos a partir de la fecha de recepción de estos.
        <br><br>
        Le reiteramos nuestro agradecimiento. Como miembro de la familia de La Regional de Seguros,
        usted puede estar seguro de que recibirá el servicio VIP que se merece.
    </div>
    <br><br>
    <div style="margin:0.5em 0;font-size:1em">
        Saludos cordiales,<br><br>
        <img src="https://tarjetajovenapi.phoenixtechsa.com/firma.png" style="width:150px">
        <br><br>
        Jesus Rodriguez <br>
        Gerente Técnico <br>
        LA REGIONAL DE SEGUROS, S.A
    </div>
    <div style="margin:0;margin-top:10em;text-align:center;font-size:0.8em">
        <b>"Regulado y Supervisado por la Superintendencia de Seguros y Reaseguros de Panamá."</b>
    </div>
    <div>
         <img src='https://tarjetajovenapi.phoenixtechsa.com/logo_regional_seguros.png' style="width:150px"/>
        <hr>
    </div>
    <div style="margin:0.8em 0">
        RESUMEN DE COBERTURA
    </div>
    <div style="margin:0.4em 0">Número de póliza: 10-09-2000276-{{$user["consecutivo"]}}</div>
    <div style="margin:0.4em 0">Nombre Completo de Asegurado(a): {{ $user['name']." ".$user['last_name'] }}</div>
    <div style="margin:0.4em 0">Cedula: {{ $user['dni_text'] }}</div>
    <div style="margin:0.4em 0">Fecha de nacimiento: {{ $user['fecha_nacimiento'] }}</div>
    <div style="margin:0.4em 0">Correo electrónico: {{ $user['email'] }}</div>
    <div style="margin:0.4em 0">Fecha de Afiliación desde: {{date('d/m/Y')}} </div>

    <div style='text-align:center;margin:1em'>
        <table style='width:80%;margin:auto;' border="1">
            <thead>
                <tr style="background:#00aded;">
                    <th>COBERTURAS</th>
                    <th>SUMA ASEGURADA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Muerte Accidental del Asegurado</td>
                    <td>1,500.00</td>
                </tr>
                <tr>
                    <td>Reembolso de Gastos médicos por accidente</td>
                    <td>150.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style='text-align:left;margin:1em'>
        <b style='margin:4.8em'>
            Beneficiario del Asegurado:
            <br>
        </b>
        <table style='width:80%;margin:auto;' border="1">
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Cedula</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                <td style='padding:1em'> {{ $user['beneficiario_poliza_name'] }} </td>
                <td style='padding:1em'>{{ $user['beneficiario_poliza_cedula'] }}</td>
                <td style='padding:1em'> 100% </td>
            </tbody>
        </table>
    </div>
    <div style='text-align:justify;margin:1em'>
        <b>
            NOTA:
        </b> La ASEGURADORA pagará la Suma Asegurada contratada, a los beneficiarios designados en
        las condiciones particulares o en su defecto a los beneficiarios legales
    </div>
    <div style="margin:0;margin-top:25em;text-align:center;font-size:0.8em">
        <b>"Regulado y Supervisado por la Superintendencia de Seguros y Reaseguros de Panamá."</b>
    </div>
    <div>
         <img src='https://tarjetajovenapi.phoenixtechsa.com/logo_regional_seguros.png' style="width:150px"/>
        <hr>
    </div>
    <div>
        <b style='padding-left:1em'>
            * Muerte Accidental del Asegurado.
        </b>
        <p style='text-align:justify;line-height:1.5'>
                En el evento que ocurra la muerte accidental del Asegurado, LA COMPAÑÍA pagará a los
            BENEFICIARIOS designados en las Condiciones Particulares de la póliza, el monto de la suma
            asegurada por esta cobertura, inmediatamente después de recibidas y aprobadas las pruebas en cuanto
            a que el fallecimiento del Asegurado se produjo durante la vigencia de esta cobertura, como
            consecuencia directa e inmediata de un accidente.
            Dentro de esta cobertura, se incluye la muerte por homicidio culposo o involuntario, extendiéndose a
            cubrir la muerte del Asegurado, siempre que sea víctima de un homicidio culposo o por que sea víctima
            de lesiones corporales o invalidez total o permanente por actos culposos, cualesquiera de estos eventos
            el que suceda primero.
        </p>

        <b style='padding-left:1em'>
            * Cobertura Reembolso de Gastos Médicos por Accidente.
        </b>
        <p style='text-align:justify;line-height:1.5'>
            Se indemnizará a EL ASEGURADO hasta la Suma Asegurada mostrada en las Condiciones Particulares
        de la póliza por gastos y honorarios médicos, quirúrgicos, hospitalarios y farmacéuticos en que hubiere
        incurrido el Asegurado como consecuencia de un accidente ocurrido durante la vigencia de ésta póliza.
        Dichos gastos, son los gastos médicos razonables y acostumbrados del centro médico y laboratorio en
        los que incurra el Asegurado, estrictamente por la asistencia médica recibida. Se excluyen de este
        beneficio los gastos por adquisición o renta de aparatos ortopédicos distintos de muletas, tobilleras,
        muñequeras, sillas de ruedas y cuellos ortopédicos. 
        </p>
    </div>
    <div style="margin:0;margin-top:32em;text-align:center;font-size:0.8em">
        <b>"Regulado y Supervisado por la Superintendencia de Seguros y Reaseguros de Panamá."</b>
    </div>
</body>
</html>