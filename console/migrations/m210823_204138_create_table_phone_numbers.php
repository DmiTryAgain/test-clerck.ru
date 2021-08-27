<?php

use yii\db\Migration;

/**
 * Class m210823_204138_create_table_phone_numbers
 */
class m210823_204138_create_table_phone_numbers extends Migration
{
    private $data = [
        ['number' => '+7(8633)514-43-66', 'peopleId' => '1', 'category' => '1'],
        ['number' => '+7(553)375-43-44', 'peopleId' => '1', 'category' => '2'],
        ['number' => '+7(0283)218-85-14', 'peopleId' => '2'],
        ['number' => '+7(281)650-80-60', 'peopleId' => '3'],
        ['number' => '+7(458)926-04-54', 'peopleId' => '4'],
        ['number' => '+7(763)140-27-96', 'peopleId' => '5', 'category' => '2'],
        ['number' => '+7(472)429-97-76', 'peopleId' => '5', 'category' => '3'],
        ['number' => '+7(9374)296-83-29', 'peopleId' => '6'],
        ['number' => '+7(3152)866-01-03', 'peopleId' => '7'],
        ['number' => '+7(909)687-06-28', 'peopleId' => '8'],
        ['number' => '+7(2575)720-97-27', 'peopleId' => '9'],
        ['number' => '+7(947)501-51-92', 'peopleId' => '10', 'category' => '1'],
        ['number' => '+7(6269)416-26-39', 'peopleId' => '10', 'category' => '2'],
        ['number' => '+7(4877)460-17-62', 'peopleId' => '11'],
        ['number' => '+7(1383)559-46-46', 'peopleId' => '12'],
        ['number' => '+7(727)621-59-81', 'peopleId' => '13'],
        ['number' => '+7(525)883-01-13', 'peopleId' => '14'],
        ['number' => '+7(695)607-97-06', 'peopleId' => '15'],
        ['number' => '+7(389)707-23-26', 'peopleId' => '16', 'category' => '1'],
        ['number' => '+7(091)215-88-43', 'peopleId' => '16', 'category' => '2'],
        ['number' => '+7(1471)875-15-54', 'peopleId' => '16', 'category' => '3'],
        ['number' => '+7(513)942-05-22', 'peopleId' => '17'],
        ['number' => '+7(3861)914-48-56', 'peopleId' => '18', 'category' => '1'],
        ['number' => '+7(3279)122-37-27', 'peopleId' => '18', 'category' => '3'],
        ['number' => '+7(225)506-36-86', 'peopleId' => '19', 'category' => '2'],
        ['number' => '+7(900)664-98-29', 'peopleId' => '19', 'category' => '3'],
        ['number' => '+7(418)905-93-72', 'peopleId' => '20', 'category' => '1'],
        ['number' => '+7(7924)806-91-46', 'peopleId' => '20', 'category' => '2'],
        ['number' => '+7(842)530-15-91', 'peopleId' => '21'],
        ['number' => '+7(773)830-27-21', 'peopleId' => '22', 'category' => '1'],
        ['number' => '+7(498)670-95-40', 'peopleId' => '22', 'category' => '2'],
        ['number' => '+7(721)304-98-13', 'peopleId' => '23', 'category' => '1'],
        ['number' => '+7(061)244-47-83', 'peopleId' => '23', 'category' => '2'],
        ['number' => '+7(903)084-09-22', 'peopleId' => '23', 'category' => '3'],
        ['number' => '+7(532)507-92-76', 'peopleId' => '24', 'category' => '1'],
        ['number' => '+7(009)888-47-97', 'peopleId' => '24', 'category' => '2'],
        ['number' => '+7(9620)427-05-36', 'peopleId' => '25'],
        ['number' => '+7(1599)392-24-01', 'peopleId' => '26'],
        ['number' => '+7(458)261-88-23', 'peopleId' => '27'],
        ['number' => '+7(511)049-76-46', 'peopleId' => '28'],
        ['number' => '+7(605)399-42-33', 'peopleId' => '29'],
        ['number' => '+7(696)888-14-94', 'peopleId' => '30'],
        ['number' => '+7(432)895-50-14', 'peopleId' => '31'],
        ['number' => '+7(038)628-31-47', 'peopleId' => '32'],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_numbers}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string()->notNull()->defaultValue('Не задано')->comment('Номер телефона'),
            'category' => $this->smallInteger()->notNull()->defaultValue('1')->comment('Категория'),
            'description' => $this->string()->comment('Комментарий к номеру телефона'),
            'people_id' => $this->integer()->comment('id человека'),
            'created_at' => $this->dateTime()->comment('Дата создания'),
            'updated_at' => $this->dateTime()->comment('Дата обновления'),
        ]);

        $this->addForeignKey(
            'fk-peoples-people_id',
            '{{%phone_numbers}}',
            'people_id',
            '{{%peoples}}',
            'id',
            'CASCADE'
        );

        foreach ($this->data as $item)
        {
            $this->insert('{{%phone_numbers}}', [
                'number' => $item['number'],
                'category' => $item['category'] ?? random_int(1, 3),
                'people_id' => $item['peopleId'],
                'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_at' => '',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phone_numbers}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210823_204138_create_table_phone_numbers cannot be reverted.\n";

        return false;
    }
    */
}
