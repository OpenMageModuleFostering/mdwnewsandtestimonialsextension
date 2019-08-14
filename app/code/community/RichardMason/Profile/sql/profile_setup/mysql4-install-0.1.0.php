<?php

$installer = $this;

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('profile')};
CREATE TABLE {$this->getTable('profile')} (
  `profile_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `thumbnail_position` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `content_heading` varchar(255) NOT NULL DEFAULT '',
  `content` mediumtext,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `creation_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`profile_id`),
  KEY `identifier` (`content_heading`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{$this->getTable('profile/profile_store')}`;
CREATE TABLE `{$this->getTable('profile/profile_store')}` (
  `profile_id` smallint(6) NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`profile_id`,`store_id`),
  CONSTRAINT `FK_CMS_PROFILE_STORE_PAGE` FOREIGN KEY (`profile_id`) REFERENCES `{$this->getTable('profile')}` (`profile_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `FK_CMS_PROFILE_STORE_STORE` FOREIGN KEY (`store_id`) REFERENCES `{$this->getTable('core/store')}` (`store_id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS Profiles to Stores';

INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(1, 0, 'profile_examples/a5.jpg', 0, '', '', 'Example number 1', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>Vestibulum et neque neque. Vestibulum id aliquet dolor. Etiam porta nulla ac odio pharetra venenatis euismod risus pulvinar. Donec tempor molestie faucibus. Aenean tempus, mi sed scelerisque tincidunt, nunc dui tristique dui, auctor auctor eros ipsum nec augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec consectetur erat quis nisi feugiat sit amet tempus mi aliquam. Nam mattis tortor eu lectus laoreet eu dignissim turpis rhoncus. Proin eu mi neque, et hendrerit tellus. Ut sed tortor nisi, id sodales lacus. Nulla ac elit tortor. Nulla eleifend turpis ac dui venenatis convallis. Etiam quis augue justo. Nunc eget tortor magna.</p>', 'keywords, keywords,...', 'this is a new', '2010-05-24 00:00:00', '2010-05-25 11:16:10', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(2, 0, 'profile_examples/a4.jpg', 0, '', '', 'Example number 2', '<p><strong>Donec vitae consequat nibh. </strong>Morbi blandit convallis rhoncus. Sed vel sapien urna, in rhoncus eros. In quis viverra urna. Donec bibendum nunc eget dolor scelerisque aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Proin dictum urna rutrum sapien pellentesque semper. Etiam vulputate odio et orci imperdiet eu sollicitudin neque sodales. Nunc quis quam tortor. Quisque viverra massa in tellus malesuada sed bibendum massa sollicitudin. Donec cursus purus aliquet nibh ultricies hendrerit. Suspendisse potenti. Vivamus egestas dictum arcu, vitae fringilla tortor egestas ac.</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 11:15:47', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(3, 0, 'profile_examples/a3.jpg', 1, '', '', 'Example number 3', '<p><strong>Phasellus feugiat euismod orci at adipiscing.</strong> Proin bibendum velit cursus mauris dapibus elementum. Mauris ultrices nisl felis. Sed lacinia tempor varius. Fusce venenatis rhoncus sem, et imperdiet lectus adipiscing sit amet. Pellentesque ut vulputate nisl. Sed ac mauris nunc, quis dignissim augue. Quisque et tincidunt augue. Vivamus in nisl id nulla pretium bibendum. Sed pharetra ullamcorper aliquam. Sed nec est diam, vel laoreet mauris.</p>', '', '', '2010-05-26 00:00:00', '2010-05-25 11:15:15', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(4, 1, '', 0, '', '', 'Mr. Natoque et Magnis', '<p><em>'The service was brilliant! Ut luctus rhoncus mauris eu pharetra. Fusce dapibus aliquam nisl, non lacinia ligula pretium sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'</em></p>\r\n<p><strong>Mr. Natoque et Magnis</strong></p>', '', '', '2010-05-25 00:00:00', '2010-05-25 11:23:40', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(5, 1, '', 0, '', '', 'Mss. Nulla Amet', '<p><em>'Good quality of the products. Quisque fringilla diam quis lacus venenatis varius. Fusce imperdiet fringilla justo eu malesuada. Sed id nisl vulputate risus scelerisque suscipit. Nulla sit amet lorem non felis interdum venenatis. Fusce sollicitudin lorem ac erat varius sed mollis magna scelerisque.'</em></p>\r\n<p><strong>Mss. Nulla Amet</strong></p>', '', '', '2010-05-25 00:00:00', '2010-05-25 11:23:56', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(6, 2, '', 0, '', 'profile_examples/press1.pdf', 'How can I capture credit card information without a payment gateway?', '<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>If you do not have a payment gateway, but still want to accept Credit Cards for processing offline you can capture the credit card information using the Saved Credit Card payment method.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>To set this up go to&nbsp;<strong>System</strong>&nbsp;-&gt;&nbsp;<strong>Configuration</strong>&nbsp;and select&nbsp;<strong>Payment Methods</strong>&nbsp;from the left navigation. Once there you will see Saved CC as one of the available methods.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'><img style='padding: 0px; margin: 0px; border: 0px initial initial;' src='http://www.magentocommerce.com/images/uploads/admin_payment_savedcc.jpg' alt='image' /></p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>To enable this option you will want to set the Enabled dropdown to Yes.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>You can change the Title of the method to whatever you like in the Title field.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Below this you can set the preferences of this payment method just as you do with all other payment methods. This includes the status of new orders placed with this method, the sort order as it will appear in the front-end in relation to the other methods, whether your customers must enter a card verification number, and the country and order amount filters for your customer to be able to use this method.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>When you are finished, select the Save Config button and you will be able to accept credit cards without integrating with a payment gateway.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Orders placed using this method will appear in the admin with the card number, name on card and expiration date displayed to the store owner. You can then take this information and use it to charge your customers using your preferred method.&nbsp;</p>', '', '', '2010-02-09 00:00:00', '2010-05-25 11:36:50', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(7, 2, '', 0, '', 'profile_examples/press2.pdf', 'How Do I Accept Checks and Money Orders as Payment? ', '<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>To accept checks and money orders as payment for orders go to&nbsp;<strong style='padding: 0px; margin: 0px;'>System</strong>&nbsp;-&gt;&nbsp;<strong style='padding: 0px; margin: 0px;'>Configuration</strong>. Select Payment Methods from the left navigation. The current release of Magento supports offline payment using checks and money orders. Future releases will support the acceptance of electronic checks on the site.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'><img style='padding: 0px; margin: 0px; border: 0px initial initial;' src='http://www.magentocommerce.com/images/uploads/admin_payment_checks_thumb.jpg' alt='image' /></p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>To display this method to customers in the checkout process you must select Yes from the enabled dropdown.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>You are able to edit the title of the payment method by entering the text in the title field. The text entered here is what is displayed on the payment information page and on all order correspondence with the customer, including order confirmation emails, invoices, and the order history in the customer&rsquo;s account. If you only want to accept Money Orders and not Checks, for example, you can rename the method to Money Orders.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>You can then select the status you want orders placed using Checks and Money Orders. Any orders placed using the Checks / Money Orders payment method will be displayed in the admin panel with this status.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Enter the name and address of your company so that your customers know where the send the checks and to whom the checks will be payable. This information will appear in the checkout process for your customers to see.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>As with all payment methods, you can add country and order amount filters to determine which customers will be able to use this payment method. You will also be able to move the positioning of the Checks / Money Orders method around on the payment page by changing the sort order. The lowest number will be displayed in the highest position on the page.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Below this payment method is the Purchase Orders option. This is also an offline method, but it is different from Checks and Money Orders. This is intended to be used when you and the customer have established a credit system, where they are given a Purchase Order number to enter during the checkout process and you can cross-reference this number with a payment option that you have or will arrange with the customer.&nbsp;</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 11:33:08', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(8, 2, '', 0, '', 'profile_examples/press3.pdf', 'What are Tax Rules and How Do I Use Them?', '<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Tax Rules are defined as a combination of a Customer Tax Class and a Product Tax Class with a Tax Rate (see&nbsp;<a style='color: #0068b7; text-decoration: none; padding: 0px; margin: 0px;' title='What are tax classes? (product and customer)' href='http://www.magentocommerce.com/knowledge-base/entry/what-are-tax-classes-product-and-customer'>What are tax classes? (product and customer)</a>). Each customer will be assigned a class and each product is assigned a tax class. Each region is assigned a set of up to five tax rates. Based on the class of the customer and the class of the products in the shopping cart, and the region (this can be the shipping address, billing address, or shipping origin) the system will calculate out the appropriate tax.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>To create a Tax Rule go to&nbsp;<strong>Sales</strong>&nbsp;-&gt;&nbsp;<strong>Tax</strong>&nbsp;-&gt;&nbsp;<strong>Manage Tax Rules</strong>. Once there you will see a grid list of the Tax Rules you have created. To create a Tax Rule you will also have to create Tax Rates, along with the Tax Classes. See&nbsp;<a style='color: #0068b7; text-decoration: none; padding: 0px; margin: 0px;' title='How do I define tax rates?' href='http://www.magentocommerce.com/knowledge-base/entry/how-do-i-define-tax-rates-per-product-tax-rules/'>How do I define tax rates?</a>&nbsp;for more on setting Tax Rates.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Once you have created your Tax Classes and Tax Rates you can create rules. In this case we are going to create four rules. We have two different customer types, Retail customers and Wholesale Customers, and two different types of products, taxable and downloadable.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>In this example we are a store in California and we have created a tax rate of 8.25%. (NOTE: This is for example purposes only. Consult your state laws for tax rates). We have also left a rate as being 0%.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>The first Tax Rule we create is for Retail Customers buying taxable goods.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'><img style='padding: 0px; margin: 0px; border: 0px initial initial;' src='http://www.magentocommerce.com/images/uploads/admin_tax_rule1.jpg' alt='image' width='455' height='210' /></p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>We select the Customer and Product class from the dropdowns and then select the Rate we want to use for this combination. In this case we want to use the first rate, 8.25%.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Select Save Rule and Retail customers with a shipping address in California will be charged a rate of 8.25% on all items marked as being Taxable Goods. That is set, but let&rsquo;s say we have downloadable items we don&rsquo;t want charge tax on. We create a new rule with the combination of the Retail Customer Tax Class and the Downloadable Items Product Tax Class and select the rate we want to charge.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>In this case the rate is the second we created, 0.0%, so customers will not be charged tax on these items.</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>Now that we have our retail customers set up with tax rates we need to set up the two rules for Wholesale Customers. We select the Wholesale Customer from the tax class, select Taxable Items and Rate 2. Then we do the same for Downloadable Items and we have our four tax rates created:</p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'><img style='padding: 0px; margin: 0px; border: 0px initial initial;' src='http://www.magentocommerce.com/images/uploads/admin_taxrule2.jpg' alt='image' width='598' height='203' /></p>\r\n<p style='margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px;'>If you need to charge tax on shipping, you can do so by creating a Tax Rule for shipping. This means that you should create a Product Tax Class that will be applied to shipping. Navigate to&nbsp;<strong>System -&gt; Configuration</strong>, and click the Sales tab. In the Tax Calculation section, you can select which product tax class will be applied to the shipping, if you choose to tax shipping. You can also determine whether tax will apply before or after discounts, and how the region of the Tax Rate will be determined (billing address, shipping destination, or shipping origin).</p>', '', '', '2010-03-17 00:00:00', '2010-05-25 11:37:07', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(9, 3, 'profile_examples/article1pic.jpg', 0, 'profile_examples/article1.jpg', '', 'cnet Wireless', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut dolor sit amet nisl elementum rhoncus et at lorem. Pellentesque quis felis quis eros fermentum interdum. Curabitur nibh lacus, varius quis fermentum sit amet, pretium ut enim. Proin euismod enim a ligula tristique volutpat.</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 11:54:31', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(10, 3, 'profile_examples/article2pic.jpg', 0, 'profile_examples/article2.jpg', '', 'cnet Security', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut dolor sit amet nisl elementum rhoncus et at lorem. Pellentesque quis felis quis eros fermentum interdum. Curabitur nibh lacus, varius quis fermentum sit amet, pretium ut enim. Proin euismod enim a ligula tristique volutpat.</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 12:12:54', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(11, 3, 'profile_examples/article3pic.jpg', 0, 'profile_examples/article3.jpg', '', 'cnet Webware', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut dolor sit amet nisl elementum rhoncus et at lorem. Pellentesque quis felis quis eros fermentum interdum. Curabitur nibh lacus, varius quis fermentum sit amet, pretium ut enim. Proin euismod enim a ligula tristique volutpat.</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 12:13:33', 1);
INSERT INTO `{$this->getTable('profile/profile_store')}` VALUES(12, 3, 'profile_examples/article4pic.jpg', 1, 'profile_examples/article4.jpg', '', 'cnet Business', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut dolor sit amet nisl elementum rhoncus et at lorem. Pellentesque quis felis quis eros fermentum interdum. Curabitur nibh lacus, varius quis fermentum sit amet, pretium ut enim. Proin euismod enim a ligula tristique volutpat.</p>', '', '', '2010-05-25 00:00:00', '2010-05-25 12:14:21', 1);
");

$installer->endSetup(); 