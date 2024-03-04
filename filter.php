<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People Search</title>
</head>
<body>
    <form action="multidim.php" method="get">
        <label for="search">Enter Details:</label>
        <input type="text" id="search" name="search" placeholder="Name, age, Email, contact no" size="80" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>

<?php
// Sample multidimensional array of people
$people = [
    ['name' => 'parteek', 'age' => 22, 'email' =>'dfggf@mail.com', 'phone_no' => 9501185011],
    ['name' => 'dinesh', 'age' => 23, 'email' =>'shail@mail.com', 'phone_no' => 9813535135],
    ['name' => 'sunil', 'age' => 24, 'email' =>'sunil@mail.com', 'phone_no' => 7107275071],
    ['name' => 'anuj', 'age' => 26, 'email' =>'anuj@mail.com', 'phone_no' => 9417474174],
    ['name' => 'shail', 'age' => 28, 'email' =>'dinesh@mail.com', 'phone_no' => 5201111035],
    ['name' => 'chirag', 'age' => 32, 'email' =>'chirag@mail.com', 'phone_no' => 7201111035],
];

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $customFilterCallback = function ($person) use ($searchQuery) {
        return (
            stripos($person['name'], $searchQuery) !== false || 
            stripos($person['email'], $searchQuery) !== false ||
            stripos((string) $person['age'], $searchQuery) !== false ||
            stripos((string) $person['phone_no'], $searchQuery) !== false
        );
    };
    $filteredPeople = customArrayFilter($people, $customFilterCallback);
        if (!empty($filteredPeople)) {
        echo "Search results for '$searchQuery':<br>";
        foreach ($filteredPeople as $person) {
            echo "Name: {$person['name']},
             Age: {$person['age']},
             email: {$person['email']},
              phone_no: {$person['phone_no']}<br>";
        }
    } else {
        echo "No results found for '$searchQuery'";
    }
}

function customArrayFilter($array, $callback) {
    $filteredArray = [];

    foreach ($array as $element) {
        if (call_user_func($callback, $element)) {
            $filteredArray[] = $element;
        }
    }

    return $filteredArray;
}
?>
