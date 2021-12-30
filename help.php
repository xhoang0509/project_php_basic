<?php
function format_number_to_currency($number) {
  return number_format($number, 0, ',');
}