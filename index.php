<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>


</head>
<body>


<form>
    <label for="password">Password</label>
    <input type="number" name="password" id="password">
    <br>
    
    <label for="lettere_minuscole">Lettere</label>
    <input type="checkbox" name="letters"> <br>

    <label for="lettere_maiuscole">Lettere Maiuscole</label>
    <input type="checkbox" name="lettersUpper"> <br>

    <label for="numeri">Numeri</label>
    <input type="checkbox" name="numbers"> <br>

    <label for="simboli">Simboli</label>
    <input type="checkbox" name="symbols"> <br> 

    <input type="submit"> <br>
</form>

<?php
// Dichiaro una variabile $PasswordLenght e assegno il valore della query string "password" attraverso $_GET["password"]
$PasswordLenght = $_GET["password"];
// Dichiaro altre variabili per altri parametri ($numeri, $lettere_maiuscole, $lettere_minuscole, $simboli) e assegno loro i valori corrispondenti dalle rispettive query string attraverso $_GET.
$numeri = $_GET["numbers"];
$lettere_maiuscole = $_GET["lettersUpper"];
$lettere_minuscole = $_GET["letters"];
$simboli = $_GET["symbols"];


// Ho dichiarato la funzione per generare la password, con argomenti i valori dei parametri ottenuti dalle query string
function passwordGenerator($PasswordLenght, $letters, $lettersUpper, $numbers, $symbols){

    $password = "";

    for ($i=0; $i < $PasswordLenght ; $i++) { 

        $randomNumber = "1234567890";
        $randomLetterUpper = "ABCDEFGHILMNOPQRSTUVZXYWJK";
        $randomLetter = "abcdefghilmnopqrstuvzxywjk";
        $randomSymbol = "!$%&/()=?-_,;.:@#[+*]";
    
        if($numbers === 'on'){
            $password = $password . $randomNumber; 
        };
    
        if($lettersUpper === 'on'){
            $password = $password . $randomLetterUpper; 
        };
        
        if($letters === 'on'){
            $password = $password . $randomLetter; 
        };
        
        if($symbols === 'on'){
            $password = $password . $randomSymbol; 
        };
        
    };
}
    

?>


     
</body>
</html>

