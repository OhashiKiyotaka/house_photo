
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateLikesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("likes", function (Blueprint $table) {

						$table->bigInteger('user_id')->unsigned();
						$table->bigInteger('photo_id')->unsigned();
						//$table->foreign("photo_id")->references("id")->on("photos");



						// ----------------------------------------------------
						// -- SELECT [likes]--
						// ----------------------------------------------------
						// $query = DB::table("likes")
						// ->leftJoin("photos","photos.id", "=", "likes.photo_id")
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
                Schema::dropIfExists("likes");
            }
        }
    