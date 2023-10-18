@extends('master')
@section ('header')
<h1>Formulari de registre</h1>
@endsection
@section ('content')
<div class="container">
    <form method="post" action="/">
        @csrf
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nom</label>
            <div class="col-8">
                <input type="text" class="form-control"  name="inputName" id="inputName" placeholder="Nom" Required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputCognom" class="col-4 col-form-label">Cognoms</label>
            <div class="col-8">
                <input type="text" class="form-control" name="inputCognom" id="inputCognom" placeholder="Cognom" Required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputNif" class="col-4 col-form-label">NIF</label>
            <div class="col-8">
                <input type="text" class="form-control" name="inputNif" id="inputNif" placeholder="NIF" Required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputSexe" class="col-4 col-form-label">Sexe</label>
            <div class="col-8">
                <select type="text" class="form-control" name="inputSexe" id="inputSexe" placeholder="Sexe" Required>
                    <option value="Home">Home</option>
                    <option value="Dona">Dona</option>
</select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputES" class="col-4 col-form-label">Estat Civil</label>
            <div class="col-8">
                <select type="text" class="form-control" name="inputES" id="inputES" placeholder="Estat Civil" Required>
                    <option value="Solter">Solter</option>
                    <option value="Casat">Casat</option>
                    <option value="Divorciat">Divorciat</option>
                    <option value="Viudo">Viudo</option>
</select>
            </div>
        </div>
       
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
  
</div>
@endsection