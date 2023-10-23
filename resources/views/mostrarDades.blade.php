<!doctype html>
<html lang="en">

<head>
  <title>Dades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
  </header>
  <main>
  <div>
    <h1>Dades del JSON</h1>
    <table class="table">
        <tr>
          <th>Nom</th>
          <th>Cognom</th>
          <th>NIF</th>
          <th>Sexe</th>
          <th>Estat Civil</th>
        </tr>
      <!--faig un bucle de cada "formulari" i poso les dades-->
        @foreach ($dadesJson as $dada)
        <tr>
          <td>{{$dada['inputName']}}</td>
          <td>{{$dada['inputCognom']}}</td>
          <td>{{$dada['inputNif']}}</td>
          <td>{{$dada['inputSexe']}}</td>
          <td>{{$dada['inputES']}}</td>
        </tr>
        @endforeach
    </table>
    <h1>Dades del XML</h1>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Cognom</th>
        <th>NIF</th>
        <th>Sexe</th>
        <th>Estat Civil</th>
    </tr>
    @for ($i = 0; $i < count($dadesXml->inputName); $i++)
        <tr>
            <td>{{ $dadesXml->inputName[$i] }}</td>
            <td>{{ $dadesXml->inputCognom[$i] }}</td>
            <td>{{ $dadesXml->inputNif[$i] }}</td>
            <td>{{ $dadesXml->inputSexe[$i] }}</td>
            <td>{{ $dadesXml->inputES[$i] }}</td>
        </tr>
    @endfor
</table>

  </main>
  <footer>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>