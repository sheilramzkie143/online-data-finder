<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Data Finder</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Cleanlist Finder</h1>

<form id="searchForm">
    <input type="text" id="firstname" placeholder="Enter First Name">
    <input type="text" id="middlename" placeholder="Enter Middle Name">
    <input type="text" id="lastname" placeholder="Enter Last Name">

    <button type="submit" id="searchBtn">Search</button>
</form>

<p id="loading" style="display:none; color: green; font-weight: bold;">
    Searching...
</p>

<ul id="results"></ul>
<div id="details"></div>

<!-- IMPORTANT: script MUST be at the bottom -->
<script src="script.js"></script>

</body>
</html>
