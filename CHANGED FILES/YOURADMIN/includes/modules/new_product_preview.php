<?php
/**
 * @package admin
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: new_product_preview.php for pdf attachment 2017-04-12 07:49:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
// upload image, if submitted
  if (!isset($_GET['read']) || $_GET['read'] !== 'only') {
    $products_image = new upload('products_image');
    $products_image->set_extensions(array('jpg','jpeg','gif','png','webp','flv','webm','ogg'));
    $products_image->set_destination(DIR_FS_CATALOG_IMAGES . $_POST['img_dir']);
    if ($products_image->parse() && $products_image->save($_POST['overwrite'])) {
      $products_image_name = $_POST['img_dir'] . $products_image->filename;
    } else {
      $products_image_name = (isset($_POST['products_previous_image']) ? $_POST['products_previous_image'] : '');
    }
  }
// hook to allow interception of product-image uploading by admin-side observer class
$zco_notifier->notify('NOTIFY_ADMIN_PRODUCT_IMAGE_UPLOADED', $products_image, $products_image_name);
 // upload pdf attachment if submitted
        if (!isset($_GET['read']) || $_GET['read'] == 'only') {
          $products_pdf_attachment = new upload('products_pdf_attachment');
          $products_pdf_attachment->set_extensions(array('pdf','PDF'));
          $products_pdf_attachment->set_destination(DIR_FS_CATALOG_PDF_ATTACHMENTS . $_POST['pdf_attachment_dir']);
          if ($products_pdf_attachment->parse() && $products_pdf_attachment->save($_POST['overwrite_pdf_attachment'])) {
            $products_pdf_attachment_name = $_POST['pdf_attachment_dir'] . $products_pdf_attachment->filename;
          } else {
            $products_pdf_attachment_name = (isset($_POST['products_previous_pdf_attachment']) ? $_POST['products_previous_pdf_attachment'] : '');
          }
        }
// hook to allow interception of pdf attachment uploading by admin-side observer class
$zco_notifier->notify('NOTIFY_ADMIN_PRODUCT_PDF_ATTACHMENT_UPLOADED', $products_pdf_attachment, $products_pdf_attachment_name);