<?php

use yii\db\Migration;

/**
 * Class m210823_201922_create_table_peoples
 */
class m210823_201922_create_table_peoples extends Migration
{
    private $data = [
        ['lastName' => 'Королева', 'firstName' => 'Алина', 'middleName' => 'Степановна',],
        ['lastName' => 'Леонов', 'firstName' => 'Всеволод', 'middleName' => 'Георгиевич',],
        ['lastName' => 'Молчанова', 'firstName' => 'Софья', 'middleName' => 'Фёдоровна',],
        ['lastName' => 'Яковлев', 'firstName' => 'Матвей', 'middleName' => 'Даниилович',],
        ['lastName' => 'Самсонова', 'firstName' => 'Варвара', 'middleName' => 'Алексеевна',],
        ['lastName' => 'Новиков', 'firstName' => 'Владимир', 'middleName' => 'Михайлович',],
        ['lastName' => 'Иванова', 'firstName' => 'Екатерина', 'middleName' => 'Степановна',],
        ['lastName' => 'Степанов', 'firstName' => 'Савва', 'middleName' => 'Матвеевич',],
        ['lastName' => 'Иванов', 'firstName' => 'Алексей', 'middleName' => 'Андреевич',],
        ['lastName' => 'Ильина', 'firstName' => 'Дарья', 'middleName' => 'Павловна',],
        ['lastName' => 'Савина', 'firstName' => 'Есения', 'middleName' => 'Ярославовна',],
        ['lastName' => 'Матвеев', 'firstName' => 'Михаил', 'middleName' => 'Михайлович',],
        ['lastName' => 'Васильева', 'firstName' => 'Анастасия', 'middleName' => 'Андреевна',],
        ['lastName' => 'Румянцев', 'firstName' => 'Илья', 'middleName' => 'Эминович',],
        ['lastName' => 'Сафонова', 'firstName' => 'Анна', 'middleName' => 'Алексеевна',],
        ['lastName' => 'Бородина', 'firstName' => 'Милана', 'middleName' => 'Ивановна',],
        ['lastName' => 'Толкачева', 'firstName' => 'Лидия', 'middleName' => 'Артуровна',],
        ['lastName' => 'Жуков', 'firstName' => 'Илья', 'middleName' => 'Дмитриевич',],
        ['lastName' => 'Левин', 'firstName' => 'Марк', 'middleName' => 'Артёмович',],
        ['lastName' => 'Агапова', 'firstName' => 'Александра', 'middleName' => 'Викторовна',],
        ['lastName' => 'Данилов', 'firstName' => 'Егор', 'middleName' => 'Леонидович',],
        ['lastName' => 'Баранов', 'firstName' => 'Михаил', 'middleName' => 'Викторович',],
        ['lastName' => 'Соколов', 'firstName' => 'Евгений', 'middleName' => 'Даниилович',],
        ['lastName' => 'Попов', 'firstName' => 'Владислав', 'middleName' => 'Михайлович',],
        ['lastName' => 'Соболева', 'firstName' => 'Алиса', 'middleName' => 'Николаевна',],
        ['lastName' => 'Агеева', 'firstName' => 'Арина', 'middleName' => 'Семёновна',],
        ['lastName' => 'Астафьева', 'firstName' => 'Екатерина', 'middleName' => 'Сергеевна',],
        ['lastName' => 'Михайлов', 'firstName' => 'Максим', 'middleName' => 'Святославович',],
        ['lastName' => 'Николаев', 'firstName' => 'Владимир', 'middleName' => 'Алексеевич',],
        ['lastName' => 'Новикова', 'firstName' => 'Виктория', 'middleName' => 'Максимовна',],
        ['lastName' => 'Потапов', 'firstName' => 'Павел', 'middleName' => 'Михайлович',],
        ['lastName' => 'Мельникова', 'firstName' => 'Милана', 'middleName' => 'Егоровна',],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%peoples}}', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string()->notNull()->defaultValue('Не задано')->comment('Фамилия'),
            'first_name' => $this->string()->notNull()->defaultValue('Не задано')->comment('Имя'),
            'middle_name' => $this->string()->defaultValue('Не задано')->comment('Отчество'),
            'description' => $this->string()->comment('Описание контакта'),
            'created_at' => $this->dateTime()->defaultValue((new DateTime())->format('Y-m-d'))->comment('Дата создания'),
            'updated_at' => $this->dateTime()->defaultValue((new DateTime())->format('Y-m-d'))->comment('Дата обновления'),
        ]);

        foreach ($this->data as $item)
        {
            $this->insert('{{%peoples}}', [
                'last_name' => $item['lastName'],
                'first_name' => $item['firstName'],
                'middle_name' => $item['middleName'],
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%peoples}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210823_201922_create_table_peoples cannot be reverted.\n";

        return false;
    }
    */
}
