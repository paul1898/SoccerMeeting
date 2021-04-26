<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
 </style>
    <title>Soccer Meeting</title>
  </head>
  <header>
    <table class="tableheader">
      <tr>
        <td class="tableheadercell"></td>
        <td class="tableheadercellmiddle" ><h1><a class="navtext" href="/">Soccer Meeting</a></h1></td>
      <td class="tableheadercell">
        <?php
          echo ((isset($login) && $login) ? '<a class="loginlink" href="/user/logout"><p class="login">Logout</p></a>' : '<a class="loginlink" href="/user"><p class="login">Login</p></a>');
        ?>
    </td>
    </tr>
    </table>
  </header>