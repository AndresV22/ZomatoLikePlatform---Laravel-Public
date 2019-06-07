<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogUserCreationTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::statement('
        CREATE OR REPLACE FUNCTION logUserCreation() RETURNS TRIGGER AS $example_table$
        DECLARE
          fk bigInt;
          pk bigInt;
        BEGIN
          SELECT max(id) INTO fk FROM "users";
          INSERT INTO user_registers(id, actions, created_at, updated_at, users_id)
          VALUES(NEW.id, \'User created\', now(), NULL, fk)
          ;
          SELECT max(id) INTO pk FROM user_registers;
           EXECUTE \'ALTER SEQUENCE user_registers_id_seq RESTART WITH \'|| pk + 1;
          RETURN NULL;
        END
        $example_table$ LANGUAGE plpgsql;
        ');

        DB::unprepared('CREATE TRIGGER tr_log_user_creation AFTER INSERT ON users FOR EACH ROW
          EXECUTE PROCEDURE logUserCreation()
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_log_user_creation`');
    }
}
