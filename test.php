<?php

  $word = "Hello cdcdfvfv";
  if(preg_match('/^[a-zA-Z]+$/', $word)) {
    echo "Valid word";
  } else {
    echo "Invalid word";
  }

?>