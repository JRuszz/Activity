<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "page" field is set in the POST data
    if (isset($_POST["page"])) {
        $selectedPage = $_POST["page"];
        // Redirect the user to the selected page
        header("Location: $selectedPage");
        exit;
    } else {
        echo "Please select a page.";
    }
}
?>