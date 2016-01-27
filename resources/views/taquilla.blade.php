 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/front/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->

    <nav>
    <div class="nav-wrapper">
      <a href="/" class="brand-logo center">Papalote Museo del Niño</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/registro">Registro</a></li>
        <li><a href="/preregistro">Pregistro</a></li>
      </ul>
    </div>
  </nav>


@yield('home')


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="/front/js/materialize.min.js"></script>
    </body>
  </html>
        