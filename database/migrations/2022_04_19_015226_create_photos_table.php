
    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreatePhotosTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("photos", function (Blueprint $table) {

                $table->id();
                $table->bigInteger('user_id')->unsigned();
                $table->string('filename');
                $table->timestamps();
                //$table->foreign("id")->references("photo_id")->on("photo_tag");



                // ----------------------------------------------------
                // -- SELECT [photos]--
                // ----------------------------------------------------
                // $query = DB::table("photos")
                // ->leftJoin("photo_tag","photo_tag.photo_id", "=", "photos.id")
                // ->get();
                // dd($query); //For checking



            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists("photos");
        }
    }
