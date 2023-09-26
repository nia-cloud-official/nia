<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <textarea name="" id="data" cols="30" rows="10"></textarea>
  <?php
    // $myfile = fopen("some.txt","w");
    $myfile = "Hello World";
    $myfile = fopen("some.txt","w");

    fopen("me","w",false,$myfile);
    stream_context_create([])
    
  ?>
</body>
</html>