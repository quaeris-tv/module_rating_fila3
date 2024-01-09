<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----

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
            function (Blueprint $table) {
                $table->increments('id');
                $table->nullableMorphs('post');
                // $table->nullableMorphs('related');
                // $table->integer('rating')->nullable();
                $table->integer('value')->nullable();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->string('deleted_by')->nullable();
                $table->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('user_id')) {
                    $table->integer('user_id')->nullable()->index();
                }
                if ($this->hasColumn('related_id') && ! $this->hasColumn('rating_id')) {
                    $table->renameColumn('related_id', 'rating_id');
                }
                if (! $this->hasColumn('related_id') && ! $this->hasColumn('rating_id')) {
                    $table->integer('rating_id');
                }
                if ($this->hasColumn('related_type')) {
                    $table->dropColumn('related_type');
                }
                if ($this->hasColumn('rating')) { // meglio tenere per relazione a ratings che sarebbero gli obiettivi
                    $table->renameColumn('rating', 'value');
                }
                if ($this->hasColumn('auth_user_id')) {
                    $table->dropColumn('user_id');
                    $table->renameColumn('auth_user_id', 'user_id');
                }
            }
        );
    }
}
