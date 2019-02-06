try {
    $this->pdo = new PDO('mysql:host='.localhost.';charset=utf8', root, "");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo 'Error occurred: '.implode(": ",$this->pdo->errorInfo());
    //echo "PDO connection error: " . $this->pdo::ERRMODE_EXCEPTION;
    exit;
}






//add the created database to the connection
$this->pdo->query("use " . billspc);

//Create a Pokemon table
$sql = "CREATE TABLE Pokemon (
id INT(4) UNSIGNED PRIMARY KEY,
name VARCHAR(500) NOT NULL,
types VARCHAR(500) NOT NULL,
height FLOAT NOT NULL,
weight FLOAT NOT NULL,
abilities VARCHAR(500) NOT NULL,
egg_groups VARCHAR(500) NOT NULL,
stats VARCHAR(500) NOT NULL,
genus NVARCHAR(500) NOT NULL,
description VARCHAR(500) NOT NULL
)";



$file = fopen(public/extras/pokedex.csv, 'r');

while ($row = fgetcsv($file)){
    $value = "'" . implode("','", $row) . "'";
    $query = "INSERT INTO Pokemon(id,name,types,height,weight,abilities,egg_groups,stats,genus,description) VALUES(". $value .")";

    $pokedex->pdo->query($query);
}
