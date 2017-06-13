<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Like random stuff</title>
    <style>
      .container {
        position: relative;
        width: 800px;
        /*height: 600px;*/
        background-color: lightgrey;
        margin: 0 auto;
      }
      .container .box {
        width: 95%;
        /*height: 100px;*/
        padding: 20px;
      }
      .post-by {
        float:right;
      }
      .post {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 10px;
        padding-right: 10px;
      }
      .post-text {
        padding-bottom: 10px;
      }
      .posted-at {
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
    <a href="logout.php">Logout</a>

      <div class="container">
          <h1 style="text-align: center;">Posts</h1>
          <div class="box">

                  <div class="post">
                      <div class="post-text">
                        The most technologically efficient machine that man has ever invented is the book.
                      </div>
                      <div class="post-by">
                        <!-- User Firstname + lastname -->
                        Northrop Frye
                      </div>
                      <div class="like-count">
                        Likes: 100 - <a href="like.php?id=1&action=like">Like</a>
                        <!-- Where id=x |||| x - post_id -->
                      </div>
                      <div class="posted-at">
                        2017-06-13 10:00:00
                      </div>
                  </div>
                  <!--  -->
                  <div class="post">
                      <div class="post-text">
                        Just because something doesn’t do what you planned it to do doesn’t mean it’s useless.
                      </div>
                      <div class="post-by">
                        <!-- User Firstname + lastname -->
                        Thomas Edison
                      </div>
                      <div class="like-count">
                        Likes: 100 - <a href="like.php?id=1&action=unlike">Unlike</a>
                        <!-- Where id=x |||| x - post_id -->
                      </div>
                      <div class="posted-at">
                        2017-06-13 10:00:00
                      </div>
                  </div>
                  <!--  -->
                  <div class="post">
                      <div class="post-text">
                        It has become appallingly obvious that our technology has exceeded our humanity.
                      </div>
                      <div class="post-by">
                        <!-- User Firstname + lastname -->
                        Albert Einstein
                      </div>
                      <div class="like-count">
                        Likes: 100 - <a href="like.php?id=1&action=like">Like</a>
                        <!-- Where id=x |||| x - post_id -->
                      </div>
                      <div class="posted-at">
                        2017-06-13 10:00:00
                      </div>
                  </div>

          </div>
          <div class="box">
              <h3>Write a post:</h3>
              <form method="post" action="post_thread.php">
                <label for="message">Post text:</label>
                <br>
                <textarea rows="9" cols="100" id="message" name="message"></textarea>
                <br>
                <input type="submit" name="submit" value="Submit">
              </form>
          </div>
      </div>
  </body>
</html>
