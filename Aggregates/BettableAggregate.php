<?php

declare(strict_types=1);
/**
 * @see https://github.com/cnastasi/event-sourcing-with-laravel/blob/main/app/Aggregates/ProductAggregate.php
 */

namespace Modules\Rating\Aggregates;

use Carbon\Carbon;
use Modules\Blog\Datas\RatingArticleData;
use Modules\Blog\Datas\RatingArticleWinnerData;
use Modules\Blog\Error\NullArticleError;
use Modules\Blog\Error\RatingClosedArticleError;
use Modules\Blog\Events\Article\CloseArticle;
use Modules\Blog\Events\RatingArticle;
use Modules\Blog\Events\RatingArticleWinner;
use Modules\Blog\Events\RatingClosedArticle;
use Modules\Blog\Models\Article;
use Modules\Blog\Models\Profile;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class BettableAggregate extends AggregateRoot
{

}