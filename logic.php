<?php

function generate_password($number_of_words) {

  // filename to open
  $filename = 'wordsEn.txt';

  // array of dictionary words
  $words = file($filename, FILE_IGNORE_NEW_LINES);

  $password = array($number_of_words);

  // generate password
  for ($i = 0; $i < $number_of_words; $i++) {
    $password[$i] = $words[rand(0, count($words))];
  }

  return password_to_string($password, "-");

}

//
// Takes an array of strings and a splitter and returns a string for the password
function password_to_string($password_array, $splitter) {

  // set the first element so we don't have to deal with the splitter
  $output = $password_array[0];

  // iterate over the remainder of the array and create the string output using the $splitter defined.
  for ($i = 1; $i < count($password_array); $i++) {
    $output = $output . $splitter . $password_array[$i];
  }

  return $output;
}

?>
