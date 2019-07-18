<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class calculatePlacesAverageValueTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::statement('
        CREATE OR REPLACE FUNCTION calculateAverageValue() RETURNS TRIGGER AS $example_table$
        DECLARE
          newPk bigInt;
          pk bigInt;
          maxPk bigInt;
          average float;
        BEGIN

          SELECT max(id) INTO maxPk FROM comments;

          SELECT place_id INTO newPk
          FROM comments
          WHERE id = maxPk;

          


          SELECT AVG(value) INTO average
          FROM (SELECT id, value, place_id
                FROM comments
                WHERE place_id = newPk) AS derivedTable;

          UPDATE places
          SET average_value = average
          WHERE id = newPk;

          RETURN NULL;

        END
        $example_table$ LANGUAGE plpgsql;
        ');

        DB::unprepared('CREATE TRIGGER tr_calculate_places_average_value AFTER INSERT ON comments FOR EACH ROW
          EXECUTE PROCEDURE calculateAverageValue()
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
        DROP TRIGGER `tr_calculate_places_average_value`;
        DROP FUNCTION calculateAverageValue;
        ');
    }
}
