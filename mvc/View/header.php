<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SOS</title>
  <link rel="stylesheet" href="View\media\stylesheet.css" type="text/css">
  </head>
<body>
<div class="header">
  <h1>My Website</h1>
  <p>A website created by me.</p>
</div>
  <div class="navbar">
  <a href="#">Home</a>
  <a href="?act=contacts">Contacts</a>
  <a href="?act=products">Products</a>
  <a href="#" class="right">Login</a>
</div>
<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3>More Text</h3>
    <p>Lorem ipsum dolor sit ame.</p>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div>
  </div>
  <div class="main">
      
    <?= isset($msg) ? "<div class='full-button'>".$msg."</div>":NULL;?>
