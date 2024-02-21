<?php
// Sample array 
$names = ['panakj', 'mayank', 'shall', 'gaurav', 'anoj'];

// Check if a search query is provided
if (isset($_GET['search'])) {
    // Get the search query from the URL parameter
    $searchQuery = $_GET['search'];
   $filteredNames = array_filter($names, function ($name) use ($searchQuery) {
       return stripos($name, $searchQuery) !== false;
    });
     if (!empty($filteredNames)) {
        echo "Search results for '$searchQuery': " . implode(', ', $filteredNames);
    } else {
        echo "No results found for '$searchQuery'";
    }
}

?>
<html>
<html lang="en">
<body>
    <form action="search.php" method="get">
        <label for="search">Search by Name:</label>
        <input type="text" id="search" name="search" required>
        <button type="submit">Search</button>
    </form>

</body>
</html>
