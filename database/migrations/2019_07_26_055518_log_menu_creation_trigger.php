<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogMenuCreationTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::statement('
        CREATE OR REPLACE FUNCTION logMenuCreation() RETURNS TRIGGER AS $example_table$
        DECLARE
          pk bigInt;
          newPk bigInt;
          placeName varchar;
          userId bigInt;
          menuName varchar;
        BEGIN
          
          SELECT max(id) INTO pk FROM "user_registers";

          CASE
            WHEN pk IS NULL THEN
              newPk = 1;
            ELSE
              newPk = pk + 1;
          END CASE;

          SELECT name INTO placeName FROM "places" WHERE (id = NEW.place_id);
          SELECT user_id INTO userId FROM "places" WHERE (id = NEW.place_id);
          SELECT name INTO menuName FROM "menus" WHERE (id = NEW.id);

          INSERT INTO user_registers(id, actions, created_at, updated_at, user_id)
          VALUES(newPk, concat(\'User created the \', menuName, \' menu at \', placeName), now(), NULL, userId);

          SELECT max(id) INTO pk FROM "user_registers";
          EXECUTE \'ALTER SEQUENCE user_registers_id_seq RESTART WITH \'|| pk + 1;
          RETURN NULL;

        END
        $example_table$ LANGUAGE plpgsql;
        ');

        DB::unprepared('CREATE TRIGGER tr_log_menu_creation AFTER INSERT ON menus FOR EACH ROW
          EXECUTE PROCEDURE logMenuCreation()
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
        DROP TRIGGER `tr_log_menu_creation`;
        DROP FUNCTION logMenuCreation;
        ');
    }
}