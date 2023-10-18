<!doctype html>
<html lang="en">

<head>
  <title>Dades de l'XML</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <!--poner los datos del json-->
  <div class="container">
    <h1>Dades de l'XML</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Cognom</th>
          <th scope="col">NIF</th>
          <th scope="col">Sexe</th>
          <th scope="col">Estat Civil</th>
        </tr>
      </thead>
      <tbody>

      <!--faig un bucle de cada "formulari" i poso les dades-->
        @foreach ($dades as $dada)
        <tr>
          <td>{{$dada['inputName']}}</td>
          <td>{{$dada['inputCognom']}}</td>
          <td>{{$dada['inputNif']}}</td>
          <td>{{$dada['inputSexe']}}</td>
          <td>{{$dada['inputES']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>