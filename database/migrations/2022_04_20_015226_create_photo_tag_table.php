
    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreatePhotoTagTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("photo_tag", function (Blueprint $table) {

                $table->unsignedBigInteger('photo_id');
                $table->unsignedBigInteger('tag_id');
                $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                $table->timestamps();



                // ----------------------------------------------------
                // -- SELECT [photo_tag]--
                // ----------------------------------------------------
                // $query = DB::table("photo_tag")
                // ->leftJoin("tags","tags.id", "=", "photo_tag.tag_id")
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
            Schema::dropIfExists("photo_tag");
        }
    }
