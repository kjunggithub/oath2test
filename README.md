# Oauth 2.0 Server Testing with Laravel
## Install
0. Start by cloning the repo.

`git@github.com:sighfin/oath2test.git && cd oauth2test`

1. Create a database and fill out the `mysql` array in `app/config/database.php`.

2. Run the following commands to setup the application and migrate all needed tables.

```shell
composer install
php artisan key:generate
php artisan migrate
```

3. Create a new record on the `users` table. Please make note of the `username` and `password` values for later.

```php
$user = new User;
$user->username = 'username';
$user->password = Hash::make('password');
$user->save();
```

4. Create a new record on the `oauth_clients` table. Please make note of the `id` and `secret` values for later.
5. Create a new record on the `oauth_scopes` table. and set the `id` value to `basic` and add a `description`.

## Testing Endpoints
Create a `POST` request to this URI `http://domain.tld/oauth/access_token` with the following form data.

- grant_type = password
- username = username on the `users` table
- password = password on the `users` table
- client_id = id on the `oauth_clients` table
- client_secret = secret on the `oauth_clients` table

When the request is successful, an `access_token` will be genereated and added to the `oauth_access_tokens` table. This `access token` is used as a data value when making API requests that requires authentication.

Create a `POST` request to this uri http://domain.tld/api/v1/users and pass the `access_token` as the form data.

Create a `POST` request to this uri http://domain.tld/api/v1/register without any form data. This particular endpoint does not require authentication.

## Todos
- Add code to request the `access token` again when it has been expired.
- Delete oauth token from the `oauth_access_tokens` table if they've been expired and a client try to use it.
- Add request limiting functionality to the public API endpoints.
- Figure out a way to append `client_id` and `client_secret` values securely when the client makes a request for an access token.