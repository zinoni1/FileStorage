<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class controladorFile extends Controller
{
    public function validarDades(Request $request)
    {   //que les dades siguin obligatories
        $validator = Validator::make($request->all(), [
            'inputName' => 'required',
            'inputCognom' => 'required',
            'inputNif' => 'required|regex:/^[0-9]{8}[a-zA-Z]$/',//aixo fa que cumpleixi la nomra de 8 digits i 1 lletra
            'inputSexe' => 'required',
            'inputES' => 'required',
        ]);
        //si algo del formulari esta buit i no esta "requiered" a l'html surt l'error de que no pot estar un input buit
        if ($validator->fails()) {
            return redirect('/errors')
                ->withErrors($validator)
                ->withInput();
        }
    
        $dades = $request->all();
        //si el NIF es incorrecte surt l'error de NIF no vàlid
        $nifValid = $this->validarNif($dades['inputNif']);
        if (!$nifValid) {
            return redirect('/errors')
                ->withErrors(['inputNif' => 'NIF no vàlid'])
                ->withInput();
        }
        //retorna les dades
        return $dades;
    }
    
    public function guardarDades(Request $request)
    {   //agafa les dades
        $dades = $this->validarDades($request);
        //si les dades no han passat la validació
        if (!is_array($dades)) {
            return $dades;
        }
    
        $arxiuJson = 'dades.json';
        $dadesExistents = [];
        //mira si existeix l'arxiu JSON y s'escriu a dins i si no crea desde un array buit
        if (Storage::disk('local')->exists($arxiuJson)) {
            $dadesExistents = json_decode(Storage::disk('local')->get($arxiuJson), true);
        }

        $dadesExistents[] = $dades;
        //s'afageixen les dades a i es mantenen les dades que ja hi eren
        Storage::disk('local')->put($arxiuJson, json_encode($dadesExistents));
    
        //crear XML i asignarli el nom dades.xml
        $arxiuXml = 'dades.xml';
        $xml = new \SimpleXMLElement('<dades/>');
        //paso les dades a un bon format xml i despres es guarda a dades.xml dins de public
        $this->arrayDeXml($dades, $xml);  
        Storage::disk('public')->put($arxiuXml, $xml->asXML());
    
        return redirect('/mostrardades');
    }
    

//per validar el NIF
        private function validarNif($nif)
        {
            //agafar l'ultim caracter (la lletra)
            $lletraNif = substr($nif, -1);
            //agafar tot menys l'ultim (la lletra) aixi nomes agafa els numeros i ho converteix de una cadena a int
            $numNif = (int)substr($nif, 0, -1);
            //retorna la lletra
            $lletraCalculada = $this->calcularLletraNif($numNif);
    //compara la lletra calculada amb la del nif i les fa majuscules i si son iguals esta be (true) si no malament (false)
            return Str::upper($lletraCalculada) === Str::upper($lletraNif);
        }
    

//per calcular la lletra del NIF
        private function calcularLletraNif($numNif)
        {   //les lletres ordenades segons indica el ministeri d'interior
            $lletras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            //agafa la lletra que esta a la posicio que ha donat de resultat
            return $lletras[$numNif % 23];
        }

        //perque es mostri bé les dades del xml
        public function arrayDeXml($data, &$xml) {
            //per cada 1 posa el seu valor dins de cada input arregla aquest problema: de (<Zenon>inputName</Zenon>) a (<inputName>Zenon</inputName>)
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $subnode = $xml->addChild($key);
                    $this->arrayDeXml($value, $subnode);
                } else {
                    $xml->addChild($key, htmlspecialchars($value));  
                }
            }
        }

        public function mostrarJson()
        {   //poso el nom de l'arxiu json
            $arxiuJson = 'dades.json';
            //creo un array buit
            $dades = [];
            //si existeix l'arxiu json, es guarda tota la informació a dades i si no es queda buit
            if (Storage::disk('local')->exists($arxiuJson)) {
                $dades = json_decode(Storage::disk('local')->get($arxiuJson), true);
            }
            //retorna les dades
            return view('mostrarDades', ['dades' => $dades]);
        }

    };
    
