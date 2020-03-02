# Laravel Simple Articles

### Description

Laravel Simple Articles allows you to easily install an extension for
your Laravel App for managing articles. This extension is easily configurable
for your needs.

For editing articles the extension uses Summernote bootstrap extension:

[summernote.org](https://summernote.org)

## Installation

##### 1. Download the extension via composer:
```
composer require vanguardkras/laravel-simple-articles
```

##### 2. In order to make pictures available, create laravel symbolic link to storage
in console:

```
php artisan storage:link
```

##### 3. Add database table:
```
php artisan migrate
```

## Usage

Articles are now available on: your.domain/articles

Articles admin panel is available on: your.domain/admin_articles

## Configuration

You obviously would like to configure views and some extensions feature.
In this sections, will be explained how to do this.

### Edit views and translations

#### Views
To edit view files, publish the extension views:
```
php artisan vendor:publish --tag=articles_views
```

Now you can edit them in resources/views/vendor/articles

#### Articles per page
To edit the number of articles per page publish the extension config:
```
php artisan vendor:publish --tag=articles_config
```
And modify ```per_page``` parameter.

#### Translations
To edit translation files, publish the extension translations:
```
php artisan vendor:publish --tag=articles_translations
```

Now you can edit them in resources/lang/vendor/articles

### User policy

In default behaviour any user is able to manage article. Of course, it is not
appropriate for any production environment.

To change this behaviour you need to create in any class a static method that
accept one optional parameter of an App\User instance and returns a boolean value like so:

```
    /**
     * Method checks user's right to manage articles.
     *
     * @param User|null $user
     * @return bool
     */
    public static function checkUser(?User $user)
    {
        return $user ? $user->id === 1 : false;
    }
```

In this method describe your logic for allowed users.

Then publish the config file:
```
php artisan vendor:publish --tag=articles_config
```

And edit 'check_method' parameter in config/articles.php
```
'check_method' => '\Vanguardkras\LaravelSimpleArticles\Http\Controllers\ArticleController@checkUser',
```

Before @ should be your class full name, and after @, its static method. 


### Note for russian users

If you want to make summernote html editor interface work in Russian, publish
its JS translation:
```
php artisan vendor:publish --tag=articles_public
```
