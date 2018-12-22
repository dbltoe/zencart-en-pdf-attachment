##################################################################################
# UNINSTALL - 2017-04-12 - webchills
##################################################################################

ALTER TABLE products DROP products_pdf_attachment;
ALTER TABLE products_description DROP pdf_attachment_name;
DELETE FROM product_type_layout WHERE configuration_key = 'SHOW_PRODUCT_INFO_PDF_ATTACHMENT';