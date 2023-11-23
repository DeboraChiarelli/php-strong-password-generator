
<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente. -->

<?php
// Dichiaro una funzione necessaria a generare una password casuale di lunghezza specificata.
function generatePassword($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+'; // stringa di caratteri possibili che possono essere utilizzati nella password.
    // Inizializzo una stringa vuota chiamata $password che conterrà la password generata.
    $password = '';
    // Utilizzo il ciclo for per iterare dalla posizione 0 fino alla lunghezza desiderata $length. 
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)]; // Ad ogni iterazione, viene concatenato un carattere casuale dalla stringa $characters alla variabile $password
    //  La funzione rand(0, strlen($characters) - 1) genera un numero casuale che viene utilizzato come indice per selezionare un carattere dalla stringa di caratteri.
    }
    return $password;
}

// La funzione isset($_GET['length']) verifica se la variabile $_GET contiene una chiave chiamata 'length'.
// La funzione isset restituisce true se la chiave esiste in $_GET, altrimenti restituisce false.
// In questo contesto, verifica se è stato fornito un valore per la lunghezza della password attraverso il metodo GET.
// Se la condizione è true, significa che la lunghezza della password è stata fornita nella richiesta GET. 
if (isset($_GET['length'])) {
    // Quindi, viene assegnato il valore della lunghezza della password a una variabile:
    $passwordLength = $_GET['length'];
    // Questa condizione verifica se la lunghezza della password ($passwordLength) è un numero positivo. 
    //Se la condizione è true
    if ($passwordLength > 0) {
        $generatedPassword = generatePassword($passwordLength); // la lunghezza è valida e può essere utilizzata per generare una password
        // Viene utilizzato echo per stampare sulla pagina un messaggio che include la password generata.
        echo '<p>La tua password generata è:' . $generatedPassword . '</p>';
    } else {
        echo '<p>La lunghezza della password deve essere un numero positivo.</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
</head>
<body>

    <form method="GET">
        <label for="length">Inserisci la lunghezza della password:</label>
        <input type="number" id="length" name="length" min="1" required>
        <br>
        <input type="submit" value="Genera Password">
    </form>
</body>
</html>

