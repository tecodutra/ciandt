<?php
	$location = array(
        'Brasil' => 'Brasília',
        'EUA' => 'Washington',
        'Espanha' => 'Madrid',
        'Japão' => 'Tóquio',
        'China' => 'Pequim',
        'Canadá' => 'Ottawa',
        'Inglaterra' => 'Londres'
	);

    asort($location);

    foreach($location as $key => $value){
        echo "A capital do <strong>$key</strong> é <strong>$value</strong><br>";
    }