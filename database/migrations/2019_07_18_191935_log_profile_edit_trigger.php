<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogProfileEditTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::statement('
        CREATE OR REPLACE FUNCTION logProfileEdit() RETURNS TRIGGER AS $example_table$
        DECLARE
          pk bigInt;
          newPk bigInt;
        BEGIN
          
          SELECT max(id) INTO pk FROM "user_registers";

          CASE
            WHEN pk IS NULL THEN
              newPk = 1;
            ELSE
              newPk = pk + 1;
          END CASE;

          INSERT INTO user_registers(id, actions, created_at, updated_at, user_id)
          VALUES(newPk, \'User profile has been edited\', now(), NULL, OLD.id);

          SELECT max(id) INTO pk FROM "user_registers";
          EXECUTE \'ALTER SEQUENCE user_registers_id_seq RESTART WITH \'|| pk + 1;
          RETURN NULL;

        END
        $example_table$ LANGUAGE plpgsql;
        ');

        DB::unprepared('CREATE TRIGGER tr_log_profile_edit AFTER UPDATE ON users FOR EACH ROW WHEN (OLD.last_login_at IS NOT DISTINCT FROM NEW.last_login_at
                                                                                                    AND OLD.last_logout_at IS NOT DISTINCT FROM NEW.last_logout_at)
          EXECUTE PROCEDURE logProfileEdit()
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
        DROP TRIGGER \'tr_log_profile_edit\';
        DROP FUNCTION logProfileEdit;
        ');
    }
}
