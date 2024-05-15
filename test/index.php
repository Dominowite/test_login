<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
</head>
<body>
    <h2>Upload Excel File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" id="excelFile">
        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>
