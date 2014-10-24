#Oauth2 testing with Laravel

## Install

1. Create a database and fill out the `mysql` array in `app/config/database.php`.

2. Run the following commands to setup the application and create all tables.

```shell
composer install
php artisan key:generate
php artisan migrate
```

3. Create a `user` on the `User` table.

```php
$user = new User;
$user->username = 'kevin';
$user->password = Hash::make('password');
$user->save();
```

4. Create a new record on the `oauth-clients` table. Please make note of the `id` and `secret` values for later.

## Endpoints

Create a `POST` request to this uri `http://oauth-local.icstage.com/oauth/access_token` with the following form data.
- grant_type = password
- username = username on the users table
- password = password on the users table
- client_id = id on the `oauth_clients` table
- client_secret = secret on the `oauth_clients` table

Create a POST request to this uri http://oauth-local.icstage.com/api/v1/users and pass the `access_token` as the form data.

Register
POST - /api/v1/users/

Login

Get the 'x' data
GET - /api/v1/heartrate/12

