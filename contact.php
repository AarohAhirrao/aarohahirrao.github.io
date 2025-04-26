<?php
$pageTitle = 'Contact';
require 'templates/header.php';

// simple form handling
$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to      = 'you@yourdomain.com';
  $subject = 'Website Contact Form';
  $body    = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\n\nMessage:\n{$_POST['message']}";
  $headers = 'From: webmaster@yourdomain.com';
  if (mail($to, $subject, $body, $headers)) {
    $sent = true;
  }
}
?>
<section>
  <h2>Contact Me</h2>
  <?php if ($sent): ?>
    <p>Thanks for your message—I’ll get back to you soon!</p>
  <?php else: ?>
    <form method="post">
      <label>Name<br><input type="text" name="name" required></label><br>
      <label>Email<br><input type="email" name="email" required></label><br>
      <label>Message<br><textarea name="message" rows="5" required></textarea></label><br>
      <button type="submit">Send</button>
    </form>
  <?php endif; ?>
</section>
<?php require 'templates/footer.php'; ?>
