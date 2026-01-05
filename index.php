<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<p id="loading" style="display:none; color: green;">
    Searching...
</p>

    <ul id="results"></ul>
    <div id="details"></div>

    <script src="script.js?v=FINAL3"></script>
</body>
</html>
