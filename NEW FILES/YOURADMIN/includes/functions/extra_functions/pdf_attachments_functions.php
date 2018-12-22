<?php
function zen_get_pdf_attachment_name($product_id, $language_id = 0) {
    global $db;

    if ($language_id == 0) $language_id = $_SESSION['languages_id'];
    $product = $db->Execute("select pdf_attachment_name
                             from " . TABLE_PRODUCTS_DESCRIPTION . "
                             where products_id = '" . (int)$product_id . "'
                             and language_id = '" . (int)$language_id . "'");
    if ($product->EOF) return '';
    return $product->fields['pdf_attachment_name'];
  }