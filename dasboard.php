<?php 
include("./db/db.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['phone'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $user_phone = $_SESSION['phone'];

    // Insert report into database
    $sql = "INSERT INTO reports (location, category, description, user_phone) 
            VALUES ('$location', '$category', '$description', '$user_phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Report submitted successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Report</title>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            let locationInput = document.getElementById("location");
            locationInput.value = `Lat: ${latitude}, Lon: ${longitude}`;
            
            // Open location in Google Maps
            let mapsUrl = `https://www.google.com/maps?q=${latitude},${longitude}`;
            window.open(mapsUrl, "_blank");
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
</head>
<body>

<h2>Submit a Report</h2>
<form action="report.php" method="POST">
    <label for="location">Location</label>
    <input type="text" name="location" id="location" required>
    <button type="button" onclick="getLocation()">Get Current Location</button>

    <label for="category">Select A Category</label>
    <select name="category" id="category" required>
        <option value="illegal">Report Illegal Activities</option>
        <option value="pollution">Report Pollution</option>
        <option value="missing">File A Missing Case</option>
        <option value="lcse">Lack of Coastal Safety Equipment</option>
    </select>

    <label for="description">Description</label>
    <input type="text" name="description" required>

    <button type="submit">Submit Report</button>
</form>

<a href="view_reports.php">View Your Reports</a>

</body>
</html>
