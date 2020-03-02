<?php

namespace Vanguardkras\LaravelSimpleArticles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Article extends Model
{
    protected $fillable = ['title', 'meta', 'text_content'];

    /**
     * Russian short names for months
     *
     * @var array
     */
    protected $shortMonthsRus = [
        'Янв',
        'Фев',
        'Мар',
        'Апр',
        'Май',
        'Июн',
        'Июл',
        'Авг',
        'Сен',
        'Окт',
        'Ноя',
        'Дек',
    ];

    /**
     * Get the day of the article
     *
     * @param $value
     * @return false|string
     */
    public function getDayAttribute($value)
    {
        return date('d', strtotime($this->created_at));
    }

    /**
     * Get a 3 letters month of the article
     *
     * @param $value
     * @return string
     */
    public function getMonthAttribute($value): string
    {

        if (App::isLocale('ru')) {
            $index = date('n', strtotime($this->created_at));
            return $this->shortMonthsRus[$index - 1];
        }

        return date('M', strtotime($this->created_at));
    }
}
