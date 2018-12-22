##################################################################################
# INSTALL - 2017-04-12 - webchills
##################################################################################

ALTER TABLE products ADD products_pdf_attachment VARCHAR( 256 ) NOT NULL;
ALTER TABLE products_description ADD pdf_attachment_name VARCHAR( 256 ) NOT NULL;

INSERT INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('Show pdf Attachment', 'SHOW_PRODUCT_INFO_PDF_ATTACHMENT', '1', 'Display Pdf Attachment on Product Info 0= off 1= on', 1, NULL, NOW(), NOW(), NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');

