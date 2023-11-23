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

<form method="get">
    <label for="passwordLength">Lunghezza Password</label>
    <input type="number" name="passwordLength" id="passwordLength" min="1" required>
    <br>

    <label for="letters">Lettere</label>
    <input type="checkbox" name="letters" value="on"> <br>

    <label for="lettersUpper">Lettere Maiuscole</label>
    <input type="checkbox" name="lettersUpper" value="on"> <br>

    <label for="numbers">Numeri</label>
    <input type="checkbox" name="numbers" value="on"> <br>

    <label for="symbols">Simboli</label>
    <input type="checkbox" name="symbols" value="on"> <br>

    <input type="submit" value="Genera Password">
</form>

<?php
// Dichiaro una variabile $PasswordLength e assegno il valore della query string "password" attraverso $_GET["password"]
$passwordLength = $_GET["password"];
// Dichiaro altre variabili per altri parametri ($numeri, $lettere_maiuscole, $lettere_minuscole, $simboli) e assegno loro i valori corrispondenti dalle rispettive query string attraverso $_GET.
$letters = $_GET["letters"];
$lettersUpper = $_GET["lettersUpper"];
$numbers = $_GET["numbers"];
$symbols = $_GET["symbols"];


// Ho dichiarato la funzione per generare la password, con cinque parametri
function passwordGenerator($passwordLength, $letters, $lettersUpper, $numbers, $symbols){
//   Ho inizializzato una variabile $password come stringa vuota. Questa variabile sarà utilizzata per contenere i caratteri che costituiranno la password
    $password = "";

    for ($i=0; $i < $passwordLength ; $i++) { 

        $randomLetter = "abcdefghilmnopqrstuvzxywjk";
        $randomLetterUpper = "ABCDEFGHILMNOPQRSTUVZXYWJK";
        $randomNumber = "1234567890";
        $randomSymbol = "!$%&/()=?-_,;.:@#[+*]";

        passwordGenerator($passwordLength, $letters, $lettersUpper, $numbers, $symbols);

//      Se la checkbox per i numeri è selezionata
        if($letters === 'on'){
            $password .= $randomLetter[rand(0, strlen($randomLetter) - 1)]; // allora aggiungo il carattere casuale alla password 
        };
    
        if($lettersUpper === 'on'){
            $password .= $randomLetterUpper[rand(0, strlen($randomLetterUpper) - 1)];
        };
        
        if($numbers === 'on'){
            $password .= $randomNumber[rand(0, strlen($randomNumber) - 1)];
        };

        if($symbols === 'on'){
            $password .= $randomSymbol[rand(0, strlen($randomSymbol) - 1)];
        };
  
    };
    // Condizione che controlla se almeno una delle checkbox è stata selezionata. Ogni checkbox ha un valore "on" quando è selezionata. 
    // Quindi, se almeno una di queste checkbox ha il valore "on", significa che l'utente ha selezionato almeno una categoria di caratteri per la generazione della password.
    // Se questa condizione è vera, viene eseguita la parte di codice che utilizza la funzione str_shuffle($password) per mischiare casualmente 
    // i caratteri della password generata, e il risultato viene stampato.
    // Se la condizione non è vera, cioè nessuna checkbox è stata selezionata, viene eseguita la parte di codice nel blocco else, che stampa "Seleziona almeno una checkbox". 
    // Questo avvisa l'utente che deve selezionare almeno una categoria di caratteri per generare la password.

    if ($numbers === 'on' || $letters === 'on' || $lettersUpper === 'on' || $symbols === 'on') {
        echo str_shuffle($password);
    } else {
        echo "Seleziona almeno una checkbox";
    }  
}
    
?> 

</body>
</html>

