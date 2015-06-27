  <footer class="footer cf" role="contentinfo">

    <div class="copyright">
      <?php echo $site->copyright()->kirbytext() ?>
    </div>

    <div class="colophon">
      <a href="http://getkirby.com/made-with-kirby-and-love"><?php echo l::get('made-with') ?></a>
    </div>

  </footer>

<?php echo js('assets/js/jquery-latest.min.js') ?>
<?php echo js('assets/js/scripts.js') ?>
</body>
</html>