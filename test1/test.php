<html>
  <body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
    <!-- your HTML content -->
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
    <form method="post" action="verify.php">
      <?php
        require_once('recaptcha/recaptchalib.php');
        $publickey = "6Lc4G_MSAAAAAEeOtqDTTSJdWCzkko_trB447zs6"; // you got this from the signup page
        echo recaptcha_get_html($publickey);
      ?>
      <input type="submit" />
    </form>

    <!-- more of your HTML content -->
  </body>
</html>
