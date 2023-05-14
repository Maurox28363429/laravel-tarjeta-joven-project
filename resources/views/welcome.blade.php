<!DOCTYPE html>
<html data-theme="cmyk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.25.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/vue@3"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/scroll.css">
    <title>App Tarjeta joven diamante</title>
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
</head>
<body>
<!-- Content -->
<style type="text/css">
      .fondo{
        background: url(../assets/img/fondo3.jpg) no-repeat !important;
        background-size: 100% 100% !important;
        background-attachment: cover !important;

    }
</style>

<div class="hero min-h-screen fondo">
  <div class="text-center hero-content ">
    <form style="max-width:50em;" id='formulario'>
      <div class="p-10 card bg-base-200 shadow-lg animate__animated animate__bounceIn">
        <!--  INIT -->
        <img src="./assets/img/favicon.png" style="width:80px;height:auto;margin:auto;">
        <h2 class="text-3xl">App Tarjeta joven diamante</h2>
        <br>
        <div id='activar_form'>
		<iframe 
			width="560" 
			height="315" 
			src="https://www.youtube.com/embed/m9hsqvY0JMY" 
			title="YouTube video player" 
			frameborder="0" 
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
			allowfullscreen></iframe>
          <br>
          <br>
          <div style="display:none !important"><!-- contenido oculto -->
            <h2 style="font-size:2em;">Calificar</h2>
            <div class="rating">
              <input type="radio" value='1' name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" value='2' name="rating-2" class="mask mask-star-2 bg-orange-400" />
              <input type="radio" value='3' name="rating-2" class="mask mask-star-2 bg-orange-400" />
              <input type="radio" value='4' name="rating-2" class="mask mask-star-2 bg-orange-400" />
              <input type="radio" value='5' name="rating-2" class="mask mask-star-2 bg-orange-400" />
            </div>
          </div><!-- contenido oculto -->
          <div class="form-control p-2 w-full">
          <label class="label">
              <span class="label-text" style="font-weight:bold;">Cual vendedor lo atendio ?</span>
            </label>
            <select onchange='seleccionar_vendedor()' id='cliente' class="select select-bordered w-full" name="dni_vendedor" required style="width:100% !important;">
              <option value='no'>Seleccionar Vendedor</option>
              <option>Vendedor #1</option>
              <option>Vendedor #2</option>
              <option>Vendedor #3</option>
              <option>Vendedor #4</option>
              <option>Vendedor #5</option>
              <option>Vendedor #6</option>
              <option>Vendedor #7</option>
              <option>Vendedor #8</option>
              <option>Vendedor #9</option>
              <option>Vendedor #10</option>
              <option>Vendedor #11</option>
              <option>Vendedor #12</option>
              <option>Vendedor #13</option>
              <option>Vendedor #14</option>
              <option>Vendedor #15</option>
              <option>Vendedor #16</option>
              <option>Vendedor #17</option>
              <option>Vendedor #18</option>
              <option>Vendedor #19</option>
              <option>Vendedor #20</option>
            </select>
          </div>
          <br><br>
          <a id="button_av" class="btn cursor-pointer btn-active btn-primary" onclick="rellenar()"  disabled>Formulario de ingreso</a>
        </div>
        <!-- Campos -->
        <section id='relleno' class="flex flex-wrap" style="display:none;">
          <div class="form-control p-2 w-full">
            <label class="label">
              <span class="label-text ">Nombre</span>
            </label>
            <input required type="text" placeholder="Nombre" class="input w-full" name='Nombre'>
          </div>

          <div class="form-control p-2 w-full">
            <label class="label">
              <span class="label-text ">Apellido</span>
            </label>
            <input  required type="text" placeholder="Apellido" class="input w-full" name='Apellido'>
          </div>

          <div class="form-control p-2 w-full">
            <label class="label">
              <span class="label-text ">Cedula</span>
            </label>
            <input  type="text" placeholder="Cedula (opcional)" class="input w-full" name='Cedula'>
          </div>

          <div class="form-control p-2 w-full">
            <label class="label">
              <span class="label-text ">Telefono</span>
            </label>
            <input required type="tel" placeholder="Telefono" class="input w-full" name='Telefono'>
          </div>

          <div class="form-control p-2 w-full">
            <label class="label">
              <span class="label-text ">Correo</span>
            </label>
            <input required type="email" placeholder="Correo" class="input w-full" name='Correo'>
          </div>
          <div class="form-control p-2 w-full">
            <div class="">
              <h2 style="font-size:1.5em;text-align:left;">Dentro de que rango de edad estas ?</h2>
              <br>
              <label class="p-2">
                <input type="radio" name="edad" value='18 o menos' class="radio radio-primary" checked />
                18 o menos
              </label>

              <label class='p-2'>
              <input type="radio" value='15 a 19' name="edad" class="radio radio-primary"  />
              15 a 18
            </label>

              <label class='p-2'>
              <input type="radio" value='26 a 35' name="edad" class="radio radio-primary"  />
              26 a 35
            </label>

              <label class='p-2'>
                <input type="radio" value='36 o mas' name="edad" class="radio radio-primary"  />
                36 o más
              </label>
            </div>
          </div>
          <div class="form-control p-2 w-full">
            <h2 style="font-size:1.5em;text-align:left;">En qué áreas te gustaría tener descuentos ?</h2>
              <br>
              <div>
                <label class="label cursor-pointer">
                  <span class="label-text">Turismo interno (hoteles, viajes, resort, excursiones)</span>
                  <input  type="checkbox" name='descuentos[]' value="turismo" class="checkbox checkbox-primary descuentos_checkbox" />
                </label>
                <label class="label cursor-pointer">
                  <span class="label-text"> Estudios, universidades, colegios, librerías.</span>
                  <input type="checkbox" name='descuentos[]' value="estudios"  class="checkbox checkbox-primary descuentos_checkbox" />
                </label>
                <label class="label cursor-pointer">
                  <span class="label-text">Diversion (Eventos, vida nocturna, actividades recreativas, conciertos, cines)</span>
                  <input type="checkbox" name='descuentos[]' value="diversion" class="checkbox checkbox-primary descuentos_checkbox" />
                </label>
                <label class="label cursor-pointer">
                  <span class="label-text">Gastronomía (restaurantes y cafeterías) </span>
                  <input type="checkbox" name='descuentos[]' value="gastronomía" class="checkbox checkbox-primary descuentos_checkbox" />
                </label>
                <label class="label cursor-pointer">
                  <span class="label-text">Salud (optica, clinica, laboratorios, tratamientos dentales) </span>
                  <input type="checkbox" name='descuentos[]' value="salud" class="checkbox checkbox-primary descuentos_checkbox" />
                </label>
              </div>
          </div>
          <div class="form-control p-2 w-full">
            <h2 style="font-size:1.5em;text-align:left;">Danos tu opinion</h2>
              <br>
            <div class="grid grid-cols-2 gap-2">
              <div class="label-text text-left">¿Te gustaría ser uno de los primeros en participar de esta membresía?</div>
              <div class='p-2 text-right'>
                <span class="label-text">Si</span>
                  <input type="radio" name="menbresia" value="true" class="radio radio-primary"   />

                <span class="label-text">No</span>
                  <input type="radio" name="menbresia" value="false" class="radio radio-primary"  checked/>
              </div>
            </div>
            <br>
            <div class="grid grid-cols-2 gap-2" style="display:none !important">
              <div class="label-text text-left">¿Te gustaría participar en un concurso para el diseño de nuestro logo?</div>
              <div class='p-2 text-right'>
                <span class="label-text">Si</span>
                  <input type="radio" name="concurso" value="true" class="radio radio-primary"   />

                <span class="label-text">No</span>
                  <input type="radio" name="concurso" value="false" class="radio radio-primary" checked />
              </div>
            </div>
            <br>
          <div class="grid grid-cols-2 gap-2">
              <div class="label-text text-left">¿Recomendarías nuestra membresía a tus conocidos?</div>
              <div class='p-2 text-right'>
                <span class="label-text">Si</span>
                  <input type="radio" name="recomendar" value="true" class="radio radio-primary"   />

                <span class="label-text">No</span>
                  <input type="radio" name="recomendar" value="false" class="radio radio-primary"  checked/>
              </div>
            </div>
            <br>
          <div class="grid grid-cols-2 gap-2">
          <div class="label-text text-left">Aceptas Newsletter ?</div>
              <div class='p-2 text-right'>
                Acepto <input type="checkbox" name="newsletter" value="acepto" class="checkbox checkbox-primary">
              </div>
          </div>
          <br>
          <div class="form-control p-2 w-full">
            <label class="label">
                <span class="label-text" style="font-weight:bold;">Lugares que frecuenta?</span>
              </label>
              <select class="select select-bordered w-full" name="lugares_frecuentes" required style="width:100% !important;">
              <option>Panama Este</option> 
              <option>Panama Oeste</option> 
              <option>Panama Centro</option>
              <option>Chiriqui</option>
              <option>Otros</option>
              </select>
          </div>
          <div class="form-control p-2 w-full">
            <h2 style="font-size:1.2em;text-align:left;">¿Te gustaría dejar una recomendación?</h2>
              <br>
            <textarea class="textarea textarea-primary" placeholder="¿Te gustaría dejar una recomendación?" name='comentario'> </textarea>
          </div>
          <div class="p-2">
            <input  type="submit" class="btn " style="color:white;background:#009688;" value="Enviar" />
            <a class="btn cursor-pointer btn-active btn-primary" onclick="rellenar()">Volver</a>
          </div>
        <!-- Fin -->
        </section>
        <!-- END -->
      </div>
    </form>
  </div>
</div>
<!-- Content -->
<script type="text/javascript" src='{{ env("APP_URL").'app.js' }}'></script>
</body>
</html>
