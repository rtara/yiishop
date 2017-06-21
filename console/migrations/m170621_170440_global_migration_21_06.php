<?php

use yii\db\Migration;

class m170621_170440_global_migration_21_06 extends Migration
{
    public function safeUp()
    {

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('cart', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cart}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'VARCHAR(55) NULL',
                    'tmp_user_id' => 'VARCHAR(55) NULL',
                    'created_time' => 'INT(11) NOT NULL',
                    'updated_time' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cart_element', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cart_element}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'parent_id' => 'INT(55) NULL',
                    'model' => 'VARCHAR(110) NOT NULL',
                    'cart_id' => 'INT(11) NOT NULL',
                    'item_id' => 'INT(55) NOT NULL',
                    'count' => 'INT(11) NOT NULL',
                    'price' => 'DECIMAL(11,2) NULL',
                    'hash' => 'VARCHAR(255) NOT NULL',
                    'options' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('field', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%field}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'slug' => 'VARCHAR(255) NOT NULL',
                    'category_id' => 'INT(11) NULL',
                    'type' => 'TEXT NULL',
                    'options' => 'TEXT NULL',
                    'description' => 'TEXT NULL',
                    'relation_model' => 'VARCHAR(55) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('field_category', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%field_category}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(55) NULL',
                    'sort' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('field_value', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%field_value}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'field_id' => 'INT(11) NOT NULL',
                    'variant_id' => 'INT(11) NOT NULL',
                    'item_id' => 'INT(11) NULL',
                    'value' => 'TEXT NULL',
                    'numeric_value' => 'INT(11) NULL',
                    'model_name' => 'VARCHAR(55) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('field_variant', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%field_variant}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'field_id' => 'INT(11) NOT NULL',
                    'value' => 'VARCHAR(255) NULL',
                    'numeric_value' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('filter', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%filter}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'slug' => 'VARCHAR(155) NOT NULL',
                    'sort' => 'INT(11) NULL',
                    'description' => 'TEXT NULL',
                    'relation_field_name' => 'VARCHAR(55) NULL',
                    'is_filter' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'no\'',
                    'type' => 'VARCHAR(55) NOT NULL',
                    'relation_field_value' => 'TEXT NULL COMMENT \'PHP serialize\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('filter_relation_value', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%filter_relation_value}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'filter_id' => 'INT(11) NOT NULL',
                    'value' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('filter_value', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%filter_value}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'filter_id' => 'INT(11) NOT NULL',
                    'variant_id' => 'INT(11) NOT NULL',
                    'item_id' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('filter_variant', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%filter_variant}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'filter_id' => 'INT(11) NOT NULL',
                    'value' => 'VARCHAR(255) NULL',
                    'numeric_value' => 'INT(11) NOT NULL',
                    'latin_value' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('image', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%image}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(255) NULL',
                    'alt' => 'VARCHAR(255) NULL',
                    'filePath' => 'VARCHAR(400) NOT NULL',
                    'itemId' => 'INT(20) NOT NULL',
                    'isMain' => 'TINYINT(1) NULL',
                    'modelName' => 'VARCHAR(150) NOT NULL',
                    'urlAlias' => 'VARCHAR(400) NOT NULL',
                    'description' => 'TEXT NULL',
                    'gallery_id' => 'VARCHAR(150) NULL',
                    'sort' => 'INT(15) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('lang', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%lang}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'url' => 'VARCHAR(255) NOT NULL',
                    'local' => 'VARCHAR(255) NOT NULL',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'default' => 'SMALLINT(6) NOT NULL',
                    'date_update' => 'INT(11) NOT NULL',
                    'date_create' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(256) NOT NULL',
                    'description' => 'TEXT NOT NULL',
                    'code' => 'VARCHAR(14) NOT NULL',
                    'discount' => 'INT(2) NOT NULL',
                    'status' => 'INT(1) NOT NULL',
                    'date_elapsed' => 'DATETIME NULL',
                    'amount' => 'INT(11) NULL',
                    'type' => 'ENUM(\'percent\',\'quantum\',\'cumulative\') NOT NULL DEFAULT \'percent\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode_condition', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode_condition}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'sum_start' => 'INT(10) NOT NULL',
                    'sum_stop' => 'INT(10) NOT NULL',
                    'value' => 'INT(5) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode_to_condition', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode_to_condition}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'promocode_id' => 'INT(11) NOT NULL',
                    'condition_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode_to_item', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode_to_item}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'promocode_id' => 'INT(11) NOT NULL',
                    'item_model' => 'VARCHAR(255) NOT NULL',
                    'item_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode_use', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode_use}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'promocode_id' => 'INT(11) NOT NULL',
                    'user_id' => 'VARCHAR(55) NOT NULL',
                    'date' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('promocode_used', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%promocode_used}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'promocode_id' => 'INT(11) NOT NULL',
                    'order_id' => 'INT(11) NOT NULL',
                    'date' => 'DATETIME NOT NULL',
                    'user' => 'INT(11) NULL',
                    'sum' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('seo', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%seo}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'item_id' => 'INT(11) NULL',
                    'modelName' => 'VARCHAR(150) NOT NULL',
                    'h1' => 'VARCHAR(255) NULL',
                    'title' => 'VARCHAR(255) NULL',
                    'keywords' => 'VARCHAR(255) NULL',
                    'description' => 'VARCHAR(522) NULL',
                    'text' => 'TEXT NULL',
                    'meta_index' => 'VARCHAR(255) NULL',
                    'redirect_301' => 'VARCHAR(522) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_category', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_category}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'parent_id' => 'INT(11) NULL',
                    'name' => 'VARCHAR(55) NOT NULL',
                    'code' => 'VARCHAR(155) NULL',
                    'slug' => 'VARCHAR(255) NULL',
                    'text' => 'TEXT NULL',
                    'image' => 'TEXT NULL',
                    'sort' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_incoming', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_incoming}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'date' => 'INT(11) NOT NULL',
                    'product_id' => 'INT(11) NOT NULL',
                    'amount' => 'INT(11) NOT NULL',
                    'price' => 'DECIMAL(11,2) NULL',
                    'content' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_outcoming', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_outcoming}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'date' => 'INT(11) NOT NULL',
                    'stock_id' => 'INT(11) NOT NULL',
                    'product_id' => 'INT(11) NOT NULL',
                    'user_id' => 'INT(11) NULL',
                    'order_id' => 'INT(11) NULL',
                    'count' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_price', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_price}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'code' => 'VARCHAR(155) NULL',
                    'name' => 'VARCHAR(155) NOT NULL',
                    'price' => 'DECIMAL(11,2) NULL',
                    'price_old' => 'DECIMAL(11,2) NULL',
                    'sort' => 'INT(11) NULL',
                    'amount' => 'INT(11) NULL',
                    'type_id' => 'INT(11) NULL',
                    'item_id' => 'INT(11) NOT NULL',
                    'available' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'yes\'',
                    'type' => 'CHAR(1) NULL DEFAULT \'p\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_price_type', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_price_type}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(55) NOT NULL',
                    'sort' => 'INT(11) NULL',
                    'condition' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_producer', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_producer}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'code' => 'VARCHAR(155) NULL',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'image' => 'TEXT NULL',
                    'text' => 'TEXT NULL',
                    'slug' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_product', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_product}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'category_id' => 'INT(10) NULL',
                    'producer_id' => 'INT(11) NULL',
                    'amount' => 'INT(11) NULL',
                    'related_products' => 'TEXT NULL COMMENT \'PHP serialize\'',
                    'name' => 'VARCHAR(200) NOT NULL',
                    'code' => 'VARCHAR(155) NULL',
                    'text' => 'TEXT NULL',
                    'short_text' => 'VARCHAR(255) NULL',
                    'is_new' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'no\'',
                    'is_popular' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'no\'',
                    'is_promo' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'no\'',
                    'images' => 'TEXT NULL',
                    'available' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'yes\'',
                    'sort' => 'INT(11) NULL',
                    'slug' => 'VARCHAR(255) NULL',
                    'related_ids' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_product_modification', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_product_modification}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'amount' => 'INT(11) NULL',
                    'product_id' => 'INT(11) NOT NULL',
                    'name' => 'VARCHAR(200) NOT NULL',
                    'slug' => 'VARCHAR(255) NULL',
                    'code' => 'VARCHAR(155) NULL',
                    'images' => 'TEXT NULL',
                    'available' => 'ENUM(\'yes\',\'no\') NULL DEFAULT \'yes\'',
                    'sort' => 'INT(11) NULL',
                    'create_time' => 'DATETIME NULL',
                    'update_time' => 'DATETIME NULL',
                    'filter_values' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_product_to_category', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_product_to_category}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(11) NOT NULL',
                    'category_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_stock', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_stock}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'address' => 'VARCHAR(255) NOT NULL',
                    'text' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_stock_to_product', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_stock_to_product}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(11) NOT NULL',
                    'stock_id' => 'INT(11) NOT NULL',
                    'amount' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('shop_stock_to_user', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%shop_stock_to_user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'stock_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'username' => 'VARCHAR(255) NOT NULL',
                    'auth_key' => 'VARCHAR(32) NOT NULL',
                    'password_hash' => 'VARCHAR(255) NOT NULL',
                    'password_reset_token' => 'VARCHAR(255) NULL',
                    'email' => 'VARCHAR(255) NOT NULL',
                    'status' => 'SMALLINT(6) NOT NULL DEFAULT \'10\'',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    'group' => 'VARCHAR(20) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_user_id_5618_00','cart','user_id',0);
        $this->createIndex('idx_tmp_user_id_5618_01','cart','tmp_user_id',0);
        $this->createIndex('idx_cart_id_5748_02','cart_element','cart_id',0);
        $this->createIndex('idx_category_id_8479_03','field','category_id',0);
        $this->createIndex('idx_field_id_8699_04','field_value','field_id',0);
        $this->createIndex('idx_variant_id_8699_05','field_value','variant_id',0);
        $this->createIndex('idx_field_id_8819_06','field_variant','field_id',0);
        $this->createIndex('idx_UNIQUE_variant_id_item_id_4329_07','filter_value','variant_id,item_id',1);
        $this->createIndex('idx_filter_id_4429_08','filter_variant','filter_id',0);
        $this->createIndex('idx_UNIQUE_code_4749_09','promocode','code',1);
        $this->createIndex('idx_promocode_id_5219_10','promocode_use','promocode_id',0);
        $this->createIndex('idx_id_parent_id_5609_11','shop_category','id,parent_id',0);
        $this->createIndex('idx_item_id_5959_12','shop_price','item_id',0);
        $this->createIndex('idx_type_id_5959_13','shop_price','type_id',0);
        $this->createIndex('idx_category_id_6709_14','shop_product','category_id',0);
        $this->createIndex('idx_producer_id_6709_15','shop_product','producer_id',0);
        $this->createIndex('idx_product_id_6909_16','shop_product_modification','product_id',0);
        $this->createIndex('idx_product_id_7339_17','shop_product_to_category','product_id',0);
        $this->createIndex('idx_category_id_7339_18','shop_product_to_category','category_id',0);
        $this->createIndex('idx_stock_id_7759_19','shop_stock_to_user','stock_id',0);
        $this->createIndex('idx_UNIQUE_username_7879_20','user','username',1);
        $this->createIndex('idx_UNIQUE_email_7879_21','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_7879_22','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_cart_5728_00','{{%cart_element}}', 'cart_id', '{{%cart}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_field_category_8469_01','{{%field}}', 'category_id', '{{%field_category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_field_8689_02','{{%field_value}}', 'field_id', '{{%field}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_field_8799_03','{{%field_variant}}', 'field_id', '{{%field}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_filter_variant_4319_04','{{%filter_value}}', 'variant_id', '{{%filter_variant}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_filter_4419_05','{{%filter_variant}}', 'filter_id', '{{%filter}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_promocode_5209_06','{{%promocode_use}}', 'promocode_id', '{{%promocode}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_price_type_5949_07','{{%shop_price}}', 'type_id', '{{%shop_price_type}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_category_6699_08','{{%shop_product}}', 'category_id', '{{%shop_category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_producer_6699_09','{{%shop_product}}', 'producer_id', '{{%shop_producer}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_product_6879_010','{{%shop_product_modification}}', 'product_id', '{{%shop_product}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_product_7319_011','{{%shop_product_to_category}}', 'product_id', '{{%shop_product}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_category_7319_012','{{%shop_product_to_category}}', 'category_id', '{{%shop_category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_shop_stock_7739_013','{{%shop_stock_to_user}}', 'stock_id', '{{%shop_stock}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%cart}}',['id'=>'1','user_id'=>'d20e00de62cd50174fa6b2f20f4f8864','tmp_user_id'=>'','created_time'=>'1496351778','updated_time'=>'1496498079']);
        $this->insert('{{%cart}}',['id'=>'2','user_id'=>'','tmp_user_id'=>'d20e00de62cd50174fa6b2f20f4f8864','created_time'=>'1497828813','updated_time'=>'1498050033']);
        $this->insert('{{%cart}}',['id'=>'3','user_id'=>'','tmp_user_id'=>'f5f48c40c5ebc96e75c39a546f07e300','created_time'=>'1498040182','updated_time'=>'1498040182']);
        $this->insert('{{%cart}}',['id'=>'4','user_id'=>'','tmp_user_id'=>'9dd34f90639f0b6823f4918f4c6c5815','created_time'=>'1498040191','updated_time'=>'1498040191']);
        $this->insert('{{%cart_element}}',['id'=>'1','parent_id'=>'','model'=>'dvizh\\shop\\models\\Product','cart_id'=>'2','item_id'=>'2','count'=>'2','price'=>'','hash'=>'1bb161926dc113a150c7498507271103','options'=>'[]']);
        $this->insert('{{%image}}',['id'=>'1','title'=>'','alt'=>'','filePath'=>'Products/Product1/c5e4df.jpg','itemId'=>'1','isMain'=>'','modelName'=>'Product','urlAlias'=>'c6c51c0f10-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'2','title'=>'','alt'=>'','filePath'=>'Products/Product2/91844d.jpg','itemId'=>'2','isMain'=>'','modelName'=>'Product','urlAlias'=>'097c9acf72-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'3','title'=>'','alt'=>'','filePath'=>'Products/Product3/730d16.jpg','itemId'=>'3','isMain'=>'','modelName'=>'Product','urlAlias'=>'463fd135af-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'4','title'=>'','alt'=>'','filePath'=>'Products/Product4/a44bec.jpg','itemId'=>'4','isMain'=>'','modelName'=>'Product','urlAlias'=>'8681505346-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'5','title'=>'','alt'=>'','filePath'=>'Products/Product5/e91b6e.jpg','itemId'=>'5','isMain'=>'','modelName'=>'Product','urlAlias'=>'18c5e71cce-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'6','title'=>'','alt'=>'','filePath'=>'Products/Product6/3d848b.jpg','itemId'=>'6','isMain'=>'','modelName'=>'Product','urlAlias'=>'e478047fc2-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'7','title'=>'','alt'=>'','filePath'=>'Products/Product17/19c70c.jpg','itemId'=>'17','isMain'=>'','modelName'=>'Product','urlAlias'=>'b0d4877efb-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'8','title'=>'','alt'=>'','filePath'=>'Products/Product18/0b65de.jpg','itemId'=>'18','isMain'=>'','modelName'=>'Product','urlAlias'=>'5e2769bc29-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'9','title'=>'','alt'=>'','filePath'=>'Products/Product8/e5fc8e.jpg','itemId'=>'8','isMain'=>'','modelName'=>'Product','urlAlias'=>'0c88202bb0-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'10','title'=>'','alt'=>'','filePath'=>'Products/Product10/e0ea2a.jpg','itemId'=>'10','isMain'=>'','modelName'=>'Product','urlAlias'=>'06ce21b2ef-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'11','title'=>'','alt'=>'','filePath'=>'Products/Product7/ba31f8.jpg','itemId'=>'7','isMain'=>'','modelName'=>'Product','urlAlias'=>'ec50f402e8-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'12','title'=>'','alt'=>'','filePath'=>'Products/Product9/59c55f.jpg','itemId'=>'9','isMain'=>'','modelName'=>'Product','urlAlias'=>'f03d80917f-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'13','title'=>'','alt'=>'','filePath'=>'Products/Product15/4fab40.jpg','itemId'=>'15','isMain'=>'','modelName'=>'Product','urlAlias'=>'8d15c42b0a-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'14','title'=>'','alt'=>'','filePath'=>'Products/Product13/3f2c54.jpg','itemId'=>'13','isMain'=>'','modelName'=>'Product','urlAlias'=>'e4bc9591ab-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'15','title'=>'','alt'=>'','filePath'=>'Products/Product12/0591ef.jpg','itemId'=>'12','isMain'=>'','modelName'=>'Product','urlAlias'=>'e8270b383a-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'16','title'=>'','alt'=>'','filePath'=>'Products/Product16/499fc0.jpg','itemId'=>'16','isMain'=>'','modelName'=>'Product','urlAlias'=>'7beba44194-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'17','title'=>'','alt'=>'','filePath'=>'Products/Product14/afca84.jpg','itemId'=>'14','isMain'=>'','modelName'=>'Product','urlAlias'=>'d36209d62c-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%image}}',['id'=>'18','title'=>'','alt'=>'','filePath'=>'Products/Product11/62e6d2.jpg','itemId'=>'11','isMain'=>'','modelName'=>'Product','urlAlias'=>'c531dde3b4-2','description'=>'','gallery_id'=>'','sort'=>'']);
        $this->insert('{{%lang}}',['id'=>'1','url'=>'en','local'=>'en-EN','name'=>'English','default'=>'0','date_update'=>'1497812244','date_create'=>'1497812244']);
        $this->insert('{{%lang}}',['id'=>'2','url'=>'uk','local'=>'uk-UK','name'=>'Українська','default'=>'1','date_update'=>'1497812244','date_create'=>'1497812244']);
        $this->insert('{{%lang}}',['id'=>'3','url'=>'ru','local'=>'ru-RU','name'=>'Русский','default'=>'0','date_update'=>'1497812244','date_create'=>'1497812244']);
        $this->insert('{{%seo}}',['id'=>'1','item_id'=>'1','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'2','item_id'=>'2','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'3','item_id'=>'3','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'4','item_id'=>'4','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'5','item_id'=>'5','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'6','item_id'=>'1','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'7','item_id'=>'2','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'8','item_id'=>'3','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'9','item_id'=>'4','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'10','item_id'=>'5','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'11','item_id'=>'1','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'12','item_id'=>'2','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'13','item_id'=>'6','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'14','item_id'=>'3','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'15','item_id'=>'4','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'16','item_id'=>'5','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'17','item_id'=>'6','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'18','item_id'=>'7','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'19','item_id'=>'8','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'20','item_id'=>'9','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'21','item_id'=>'10','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'22','item_id'=>'11','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'23','item_id'=>'12','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'24','item_id'=>'13','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'25','item_id'=>'14','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'26','item_id'=>'15','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'27','item_id'=>'16','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'28','item_id'=>'7','modelName'=>'dvizh\\shop\\models\\Producer','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'29','item_id'=>'17','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'30','item_id'=>'18','modelName'=>'dvizh\\shop\\models\\Product','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'31','item_id'=>'41','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%seo}}',['id'=>'32','item_id'=>'42','modelName'=>'dvizh\\shop\\models\\Category','h1'=>'','title'=>'','keywords'=>'','description'=>'','text'=>'','meta_index'=>'','redirect_301'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'1','parent_id'=>'6','name'=>'Побутова техніка','code'=>'','slug'=>'pobutova-tehnika','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'2','parent_id'=>'6','name'=>'Телевізори і аудіо','code'=>'','slug'=>'televizori-i-audio','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'3','parent_id'=>'7','name'=>'Смартфони і телефони','code'=>'','slug'=>'smartfoni-i-telefoni','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'4','parent_id'=>'7','name'=>'Ноутбуки і планшети','code'=>'','slug'=>'noutbuki-i-planseti','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'5','parent_id'=>'','name'=>'Фото і відео','code'=>'','slug'=>'foto-i-video','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'6','parent_id'=>'','name'=>'Техніка для дому','code'=>'','slug'=>'ofisna-technika','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'7','parent_id'=>'','name'=>'Цифрова техніка
','code'=>'','slug'=>'cifrova-technika','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'8','parent_id'=>'5','name'=>'Камери','code'=>'','slug'=>'cameri','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_category}}',['id'=>'9','parent_id'=>'5','name'=>'Фотоапарати','code'=>'','slug'=>'fotoaparaty','text'=>'','image'=>'','sort'=>'']);
        $this->insert('{{%shop_price}}',['id'=>'1','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'1','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'2','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'2','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'3','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'3','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'4','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'4','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'5','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'5','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'6','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'6','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'7','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'7','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'8','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'8','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'9','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'9','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'10','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'10','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'11','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'11','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'12','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'12','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'13','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'13','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'14','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'14','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'15','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'15','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'16','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'16','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'17','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'17','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price}}',['id'=>'18','code'=>'','name'=>'Основная цена','price'=>'','price_old'=>'','sort'=>'','amount'=>'','type_id'=>'1','item_id'=>'18','available'=>'yes','type'=>'p']);
        $this->insert('{{%shop_price_type}}',['id'=>'1','name'=>'Основная цена','sort'=>'','condition'=>'']);
        $this->insert('{{%shop_producer}}',['id'=>'1','code'=>'','name'=>'Samsung','image'=>'','text'=>'','slug'=>'samsung']);
        $this->insert('{{%shop_producer}}',['id'=>'2','code'=>'','name'=>'Bosch','image'=>'','text'=>'','slug'=>'bosch']);
        $this->insert('{{%shop_producer}}',['id'=>'3','code'=>'','name'=>'Apple','image'=>'','text'=>'','slug'=>'apple']);
        $this->insert('{{%shop_producer}}',['id'=>'4','code'=>'','name'=>'Asus','image'=>'','text'=>'','slug'=>'asus']);
        $this->insert('{{%shop_producer}}',['id'=>'5','code'=>'','name'=>'Bravis ','image'=>'','text'=>'','slug'=>'bravis']);
        $this->insert('{{%shop_producer}}',['id'=>'6','code'=>'','name'=>'Lenovo','image'=>'','text'=>'','slug'=>'lenovo']);
        $this->insert('{{%shop_producer}}',['id'=>'7','code'=>'','name'=>'Sony','image'=>'','text'=>'','slug'=>'sony']);
        $this->insert('{{%shop_product}}',['id'=>'1','category_id'=>'4','producer_id'=>'4','amount'=>'','related_products'=>'','name'=>'Ноутбук ASUS VivoBook Max F541SA-XO397D Chocolate Black (90NB0CH1-M06300)','code'=>'6315898','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'noutbuk-asus-vivobook-max-f541sa-xo397d-chocolate-black-90nb0ch1-m06300','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'2','category_id'=>'4','producer_id'=>'4','amount'=>'','related_products'=>'','name'=>'Ноутбук ASUS VivoBook Max F541SC-XO119T (90NB0CI3-M02080)','code'=>'6315891','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'noutbuk-asus-vivobook-max-f541sc-xo119t-90nb0ci3-m02080','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'3','category_id'=>'4','producer_id'=>'6','amount'=>'','related_products'=>'','name'=>'Ноутбук LENOVO 100S-14 (80R9009RUA)','code'=>'6289012','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'noutbuk-lenovo-100s-14-80r9009rua','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'4','category_id'=>'4','producer_id'=>'3','amount'=>'','related_products'=>'','name'=>'Ноутбук APPLE A1466 MacBook Air 13W\" (MMGF2UA/A)','code'=>'6294337','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'noutbuk-apple-a1466-macbook-air-13w-mmgf2ua-a','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'5','category_id'=>'4','producer_id'=>'3','amount'=>'','related_products'=>'','name'=>'Ноутбук APPLE A1466 MacBook Air 13W\" (MMGG2UA/A)','code'=>'6294338','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'noutbuk-apple-a1466-macbook-air-13w-mmgg2ua-a','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'6','category_id'=>'4','producer_id'=>'3','amount'=>'','related_products'=>'','name'=>'Ультрабук APPLE A1534 MacBook 12\" Retina (MLH72UA/A)','code'=>'6294342','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'ul-trabuk-apple-a1534-macbook-12-retina-mlh72ua-a','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'7','category_id'=>'4','producer_id'=>'1','amount'=>'','related_products'=>'','name'=>'Планшет Samsung SM-T561N Galaxy Tab E 9.6 3G ZNA Gold brown','code'=>'6229736','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'planset-samsung-sm-t561n-galaxy-tab-e-9-6-3g-zna-gold-brown','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'8','category_id'=>'4','producer_id'=>'6','amount'=>'','related_products'=>'','name'=>'Планшет Lenovo IdeaPad Tab 3-710F 8GB (ZA0R0006)','code'=>'6275011','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'planset-lenovo-ideapad-tab-3-710f-8gb-za0r0006','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'9','category_id'=>'4','producer_id'=>'5','amount'=>'','related_products'=>'','name'=>'Планшет BRAVIS NB107 10.1\" 3G (black)','code'=>'6284373','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'planset-bravis-nb107-10-1-3g-black','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'10','category_id'=>'4','producer_id'=>'6','amount'=>'','related_products'=>'','name'=>'Планшет LENOVO TAB3-710I 1G+16GWH-UA (ZA0S0119UA)','code'=>'6307076','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'planset-lenovo-tab3-710i-1g-16gwh-ua-za0s0119ua','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'11','category_id'=>'1','producer_id'=>'1','amount'=>'','related_products'=>'','name'=>'Холодильник SAMSUNG RB37J5100SA/UA','code'=>'6320980','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'holodil-nik-samsung-rb37j5100sa-ua','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'12','category_id'=>'1','producer_id'=>'2','amount'=>'','related_products'=>'','name'=>'Холодильник BOSCH KAI90VI20','code'=>'6234418','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'holodil-nik-bosch-kai90vi20','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'13','category_id'=>'2','producer_id'=>'1','amount'=>'','related_products'=>'','name'=>'Телевізор SAMSUNG UE32J5200AKXUA','code'=>'6231245','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'televizor-samsung-ue32j5200akxua','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'14','category_id'=>'2','producer_id'=>'5','amount'=>'','related_products'=>'','name'=>'Телевізор BRAVIS LED-32E3000 Smart +T2 black','code'=>'6296785','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'televizor-bravis-led-32e3000-smart-t2-black','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'15','category_id'=>'3','producer_id'=>'6','amount'=>'','related_products'=>'','name'=>'Смартфон LENOVO VIBE P1m Dual Sim 16 Gb black','code'=>'6248798','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'smartfon-lenovo-vibe-p1m-dual-sim-16-gb-black','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'16','category_id'=>'3','producer_id'=>'1','amount'=>'','related_products'=>'','name'=>'Смартфон SAMSUNG SM-J510H Galaxy J5 Duos ZDD (gold)','code'=>'6280637','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'smartfon-samsung-sm-j510h-galaxy-j5-duos-zdd-gold','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'17','category_id'=>'5','producer_id'=>'7','amount'=>'','related_products'=>'','name'=>'Відеокамера SONY HDR-CX405','code'=>'6217323','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'videokamera-sony-hdr-cx405','related_ids'=>'a:0:{}']);
        $this->insert('{{%shop_product}}',['id'=>'18','category_id'=>'5','producer_id'=>'7','amount'=>'','related_products'=>'','name'=>'Цифровой фотоаппарат SONY Cybershot DSC-H300 Black','code'=>'6102521','text'=>'','short_text'=>'','is_new'=>'no','is_popular'=>'no','is_promo'=>'no','images'=>'','available'=>'yes','sort'=>'','slug'=>'cifrovoj-fotoapparat-sony-cybershot-dsc-h300-black','related_ids'=>'a:0:{}']);
        $this->insert('{{%user}}',['id'=>'1','username'=>'admin1','auth_key'=>'CLsIvv6KXYsqikxP6n-MEnOxfTaQbydb','password_hash'=>'$2y$13$ZNlGDgj3fZQPLR6eKY712.l5s5Nb0cuxqcmqKWFD0YTnFu4sIkT7C','password_reset_token'=>'','email'=>'admin@gmail.com','status'=>'10','created_at'=>'1495565580','updated_at'=>'1495565580','group'=>'superadmin']);
        $this->execute('SET foreign_key_checks = 1;');

    }

    public function safeDown()
    {
//        echo "m170621_170440_global_migration_21_06 cannot be reverted.\n";

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cart`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cart_element`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `field`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `field_category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `field_value`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `field_variant`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `filter`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `filter_relation_value`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `filter_value`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `filter_variant`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `image`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `lang`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode_condition`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode_to_condition`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode_to_item`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode_use`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `promocode_used`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `seo`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_incoming`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_outcoming`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_price`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_price_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_producer`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_product`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_product_modification`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_product_to_category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_stock`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_stock_to_product`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `shop_stock_to_user`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170621_170440_global_migration_21_06 cannot be reverted.\n";

        return false;
    }
    */
}
