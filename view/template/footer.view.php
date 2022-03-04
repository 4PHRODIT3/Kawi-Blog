        </div>
      </div>
    </div>
    <script src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <?php includeFiles($footer_files, 'js'); ?>
    <script>

      window.onload = function deleteLoader(){
        var loader = document.querySelector(".loader");
        document.body.removeChild(loader);
      };
    </script>
  </body>
</html>