<?php 
session_start();
if(isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];
}else{
    header('Location: landing.php');
}

require 'header.php';
require 'nav.php';
require 'includes/dbh.inc.php';
if(isset($_POST['edit'])){
    $id = $_GET['edit'];
    $article = $_POST['article'];
    $title = $_POST['title'];
    $mysqli->query("update article set content = '$article' , title = '$title' where id = $id");
    echo '<div class="alert alert-danger mr-4" role="alert">
                post is deleted succesfuly
               <a href="viewarticle.php?id='.$_SESSION["ID"].'">go back</a>
               </div>';
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    ?>



<div class="article-add container"><!--Container-->
  
  <div class="article-form">
      
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="topic">Article Title:</label>
          <input value="<?php if(isset($_GET['title'])){ echo $_GET['title']; } ?>" class="form-control bg-light" type="text" name="title" placeholder="article topic" required autofocus>
      </div>
      <label for="image">Image:</label>
      <div class="input-group">
          <div class="input-group-prepend mb-3">
              <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
              <input type="file" id="article-image" name="image" accept="image/*">
              <label class="custom-file-label" for="atricle-image">Choose image</label>
          </div>
      </div>
      <!-- <div class="form-group">
          <label for="date">Date of publish:</label>
          <input class="form-control" type="text" name="date" placeholder="date" required>
      </div>
      <div class="form-group">
          <label for="time">Time of publish:</label>
          <input class="form-control" type="text" name="time" placeholder="time" required>
      </div> -->
      <div class="form-group">
          <label for="article">Article:</label>
          <textarea id="froala-editor" value="<?php if(isset($_GET['content'])){ echo $_GET['content']; } ?>" class="form-control" rows="8" type="text" name="article" placeholder="article" required ></textarea>
      </div>
      <div class="form-group">
          <button class="btn btn-lg article-btn-light btn-block" name="edit">edit</button>
      </div>
      </form>
  </div>
  
</div><!--container -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>

<?php
}else {
    ?>



<div class="article-add container"><!--Container-->
  
  <div class="article-form">
      <br>
      <h1 class="mb-3 article-forest-text text-center"><i class="fas fa-newspaper"></i></h1> 
      <form action="includes/addarticle.inc.php" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-4 font-weight-normal article-forest-text text-center">Create a New Article</h1>
      <div class="form-group">
          <label for="topic">Article Title:</label>
          <input value="<?php if(isset($_GET['title'])){ echo $_GET['title']; } ?>" class="form-control bg-light" type="text" name="title" placeholder="article topic" required autofocus>
      </div>
      <label for="image">Image:</label>
      <div class="input-group">
          <div class="input-group-prepend mb-3">
              <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
              <input type="file" id="article-image" name="image" accept="image/*">
              <label class="custom-file-label" for="atricle-image">Choose image</label>
          </div>
      </div>
      <!-- <div class="form-group">
          <label for="date">Date of publish:</label>
          <input class="form-control" type="text" name="date" placeholder="date" required>
      </div>
      <div class="form-group">
          <label for="time">Time of publish:</label>
          <input class="form-control" type="text" name="time" placeholder="time" required>
      </div> -->
      <div class="form-group">
          <label for="article">Article:</label>
          <textarea id="froala-editor" value="<?php if(isset($_GET['content'])){ echo $_GET['content']; } ?>" class="form-control" rows="8" type="text" name="article" placeholder="article" required ></textarea>
      </div>
      <div class="form-group">
          <button class="btn btn-lg article-btn-light btn-block" name="submit">Submit</button>
      </div>
      </form>
  </div>
  
</div><!--container -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<?php
}
require('footer.php');
?>