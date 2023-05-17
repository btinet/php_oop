<?php

// Dateien hinzufügen, die wir benötigen:

include ("./src/Klassen/Laptop.php");   // Unsere Laptop-Klasse



// Beginn des Client Codes

$macBook = new Laptop();    // Neues Objekt mit dem Bauplan "Laptop" erzeugen


printf("Größe des Arbeitsspeichers: %s \n", $macBook->getArbeitsSpeicher());   // Ausgabe des Attributs "arbeitsSpeicher"

$macBook->setArbeitsSpeicher("16 GB");  // setzen des Attributs "arbeitsSpeicher"


printf("Größe des Arbeitsspeichers: %s \n", $macBook->getArbeitsSpeicher());    // Ausgabe des Attributs "arbeitsSpeicher"

// Ende des Client Codes