<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogUserCommentTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::statement('
        CREATE OR REPLACE FUNCTION logUserComment() RETURNS TRIGGER AS $example_table$
        DECLARE
          pk bigInt;
          newPk bigInt;
          placeName varchar;
        BEGIN
          
          SELECT max(id) INTO pk FROM "user_registers";

          CASE
            WHEN pk IS NULL THEN
              newPk = 1;
            ELSE
              newPk = pk + 1;
          END CASE;

          SELECT name INTO placeName FROM "places" WHERE (id = NEW.place_id);

          INSERT INTO user_registers(id, actions, created_at, updated_at, user_id)
          VALUES(newPk, concat(\'User made a comment at \', placeName), now(), NULL, NEW.id);

          SELECT max(id) INTO pk FROM "user_registers";
          EXECUTE \'ALTER SEQUENCE user_registers_id_seq RESTART WITH \'|| pk + 1;
          RETURN NULL;

        END
        $example_table$ LANGUAGE plpgsql;
        ');

        DB::unprepared('CREATE TRIGGER tr_log_user_comment AFTER INSERT ON comments FOR EACH ROW
          EXECUTE PROCEDURE logUserComment()
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
        DROP TRIGGER `tr_log_user_comment`;
        DROP FUNCTION logUserComment;
        ');
    }
}
