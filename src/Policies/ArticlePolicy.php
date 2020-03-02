<?php

namespace Vanguardkras\LaravelSimpleArticles\Policies;

use Vanguardkras\LaravelSimpleArticles\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any articles.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the article.
     *
     * @param User $user
     * @param Article $article
     * @return mixed
     */
    public function view(?User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param User $user
     * @return mixed
     */
    public function create(?User $user)
    {
        return self::isAllowed($user);
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param User $user
     * @param Article $article
     * @return mixed
     */
    public function update(?User $user, Article $article)
    {
        return self::isAllowed($user);
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param User $user
     * @param Article $article
     * @return mixed
     */
    public function delete(?User $user, Article $article)
    {
        return self::isAllowed($user);
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param User $user
     * @param Article $article
     * @return mixed
     */
    public function restore(?User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param User $user
     * @param Article $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }

    /**
     * Check current user rights.
     *
     * @param User $user
     * @return bool
     */
    public static function isAllowed(?User $user)
    {
        $classMethod = explode('@', config('articles.check_method'));
        $class = $classMethod[0];
        $method = $classMethod[1];

        return $class::$method($user);
    }
}
