<?php

use yii\db\Migration;

class m170116_152012_settings extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('settings', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%settings}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'key' => 'VARCHAR(45) NOT NULL',
                    'value' => 'VARCHAR(450) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_key_3886_00','settings','key',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%settings}}',['id'=>'1','key'=>'siteBrand','value'=>'Заголовок сайта']);
        $this->insert('{{%settings}}',['id'=>'2','key'=>'siteBrandLid','value'=>'']);
        $this->insert('{{%settings}}',['id'=>'3','key'=>'siteEmail','value'=>'my@email.com']);
        $this->insert('{{%settings}}',['id'=>'4','key'=>'info@obmencity.ru','value'=>'7(800) 500-00-00']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        echo "m170116_152012_settings cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
