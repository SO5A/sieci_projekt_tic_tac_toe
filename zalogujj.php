<?php

$nick=$_POST['nick'];

//$zPliku= @filegetcontents("plik.txt"); 
// wczytanie starych danych

// otwarcie pliku do odczytu
$fp = fopen("plik.txt", "r");

//odczytanie danych
$stareDane = fread($fp, filesize("plik.txt"));
$czy=strpos($stareDane,$nick);
if($czy==False)
{

	// zamknięcie pliku
	fclose($fp)

	// stworzenie nowych danych

	$noweDane =$nick." ".$stareDane;

	// zapisanie nowych danych

	// otwarcie pliku do zapisu
	$fp = fopen("plik.txt", "w");

	// zapisanie danych
	fputs($fp, $noweDane);

	//zamknięcie pliku
	fclose($fp);
}
else 
	echo "dany uzytkownik juz istnieje";




/*// zmienna $dane, która będzie zapisana
// może także pochodzić z formularza np. $dane = $_POST['dane'];
$dane = "tekst do wprowadzenia\n";

// przypisanie zmniennej $file nazwy pliku
$file = "baza.txt";

// uchwyt pliku, otwarcie do dopisania
$fp = fopen($file, "a");

// blokada pliku do zapisu
flock($fp, 2);

// zapisanie danych do pliku
fwrite($fp, $dane);

// odblokowanie pliku
flock($fp, 3);

// zamknięcie pliku
fclose($fp);*/
?>