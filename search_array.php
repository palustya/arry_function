<?php
// Sample multidimensional array of people
$people = [
    ['name' => 'parteek', 'age' => 22,'email' =>'dfggf@mail.com','phone_no' => 9501185011],
    ['name' => 'dinesh', 'age' => 23,'email' =>'shail@mail.com','phone_no' => 9813535135],
    ['name' => 'sunil', 'age' => 24,'email' =>'sunil@mail.com','phone_no' => 7107275071],
    ['name' => 'anuj', 'age' => 26,'email' =>'anuj@mail.com','phone_no' => 9417474174],
    ['name' => 'shail', 'age' => 28,'email' =>'dinesh@mail.com','phone_no' => 5201111035],
    ['name' => 'chirag', 'age' => 32,'email' =>'chirag@mail.com','phone_no' => 7201111035],
    ['name' => 'chirag kumar', 'age' => 32,'email' =>'chirag2@mail.com','phone_no' => 8201111035],
];
    if (isset($_GET['search'])) {
		$keyword = trim($_GET['search']);
		echo multiSerach($people,$keyword);
	}else{
		header('location:multidim.php');
		exit();
	}
	function multiSerach($people,$keyword){
        $searchQuery = $keyword;
          $filteredPeople = array_filter($people, function ($person) use ($searchQuery) {
               return (
				stripos($person['name'], $searchQuery) !== false || 
				stripos($person['email'], $searchQuery) !== false ||
				stripos((string) $person['age'], $searchQuery) !== false||
				stripos((string) $person['phone_no'], $searchQuery) !== false
			);
		});
       if (!empty($filteredPeople)) {
			$html =  "search results for '$searchQuery':<br>";
			foreach ($filteredPeople as $person) {
				$html .="Name: {$person['name']},
				 Age: {$person['age']},
				 email: {$person['email']},
				  phone_no: {$person['phone_no']}<br>";
			}
		} else {
			$html = "No results found for '$searchQuery'";
		}
		return $html;
	}

?>