<?php
session_destroy();  // calling session start first on destroyed.php
header('location: ../index.php?error=none');
