<?php
require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
  echo "
    <script>
        alert('Movie deleted successfully!');
        document.location.href = 'admin.php';
    </script>
    ";
}
