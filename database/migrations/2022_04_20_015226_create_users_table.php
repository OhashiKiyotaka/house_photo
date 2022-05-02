
    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("users", function (Blueprint $table) {

                $table->bigIncrements('id')->unsigned();
                $table->string('name');
                $table->string('email');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('remember_token', 100)->nullable();
                $table->timestamps();
                $table->unique('email');


                //*********************************
                // Foreign KEY [ Uncomment if you want to use!! ]
                //*********************************
                //$table->foreign("id")->references("user_id")->on("likes");



                // ----------------------------------------------------
                // -- SELECT [users]--
                // ----------------------------------------------------
                // $query = DB::table("users")
                // ->leftJoin("likes","likes.user_id", "=", "users.id")
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
            Schema::dropIfExists("users");
        }
    }
