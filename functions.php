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
?>