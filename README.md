##PHP Challenge - Response Example

###Install

1. Copy files yo your directory
2. Import `db.sql` to your MySQL database
3. Change DB connection settings in `src/Server.php`
4. Run `composer dump-autoload`

Default username is `justas` and password is `password`. If you want to change password, please update `user_accounts` table, where username is `justas` and password is `hash('sha256', 'password')`;

To add new user, go to `server.php`.