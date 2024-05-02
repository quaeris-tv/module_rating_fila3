<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----

use Modules\Rating\Models\Rating;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateRatingMorphTable.
 */
class CreateRatingMorphTable extends XotBaseMigration
{
    /**
     * db up.
     *
     * @return void
     */
    public function up()
    {
        // ----- create -----
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Rating::class, 'rating_id')->nullable();
                $table->nullableMorphs('model');
                $table->foreignIdFor(User::class, 'user_id')->nullable();
                $table->integer('value')->nullable();
                $table->text('note')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('model_id')) {
                    $table->nullableMorphs('model');
                }

                if (! $this->hasColumn('rating_id')) {
                    $table->foreignIdFor(Rating::class, 'rating_id')->nullable();
                }

                if (! $this->hasColumn('note')) {
                    $table->text('note')->nullable();
                }

                if (! $this->hasColumn('is_winner')) {
                    $table->boolean('is_winner')->default(0);
                }

                if (! $this->hasColumn('reward')) {
                    $table->decimal('reward',10,3)->default(0);
                }

                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
}
