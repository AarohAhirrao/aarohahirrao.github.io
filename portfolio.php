<?php
$pageTitle = 'Portfolio';
require 'templates/header.php';

$username = 'AarohAhirrao';
$apiUrl   = "https://api.github.com/users/{$username}/repos";
$options  = [
  'http' => [
    'method'  => 'GET',
    'header'  => "User-Agent: PHP\r\n"
  ]
];
$context  = stream_context_create($options);
$repos     = json_decode(file_get_contents($apiUrl, false, $context), true);
?>
<section>
  <h2>My GitHub Projects</h2>
  <?php if (!empty($repos)): ?>
    <ul>
      <?php foreach ($repos as $repo): ?>
        <li>
          <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank">
            <?= htmlspecialchars($repo['name']) ?>
          </a>
          <?php if (!empty($repo['description'])): ?>
            — <?= htmlspecialchars($repo['description']) ?>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>No repositories found.</p>
  <?php endif; ?>
</section>
<?php require 'templates/footer.php'; ?>
