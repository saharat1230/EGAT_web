<!DOCTYPE html>
<html lang='en'>
  <script type="text/javascript">
    function noBack(){
      window.history.forward()
    }
    noBack();
      window.onload = noBack;
      window.onpageshow = function(evt) { if (evt.persisted) noBack() }
      window.onunload = function() { void (0) }
  </script>
  <head>
    <meta charset='UTF-8'/>
    <title>Application Tracking Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css/login.css'/>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <style type="text/css">
  #btn{
  width:100%;
  }
  body {
    background-color: #FFF0AA;
  }
  body {
    margin: 0;
    font-family: 'Prompt', sans-serif;
    font-size: 16px;
  }
  </style>
  <body>
    <!-- There's nothing here! -->
    <div class='page'>
  <div class='section content'>
    <div class="container" style="padding-top:100px">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#FFF0AA">
      <center><img src="img/egatweb.png" alt="EGAT" width="230px" height="100px"></center>
      <h3 align="center"><b> ระบบติดตามแอปพลิเคชั่น <br> (Application tracking system) </b></br> </h3>
      <form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="username" class="form-control" required placeholder="Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" name="password" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
             Login </button>
               <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
               </label>
               <h5 align="center">
               แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.) <br> การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย </h5>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>
  </body>
</html>
