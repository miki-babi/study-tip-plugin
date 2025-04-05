<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Tip Plugin</title>
</head>
<body>
    <h1>Welcome to the Study Tip Plugin</h1>
    <p>This is a simple template for displaying study tips.</p>
    <form action="<?php menu_page_url( 'wporg' ) ?>" method="post">
                <label for="tip">Enter your study tip:</label><br>
        <textarea id="tip" name="tip" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Submit Tip</button>
    </form>
</body>
</html>