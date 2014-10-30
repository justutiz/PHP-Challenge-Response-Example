##PHP Challenge - Response Example

###Install

1. Copy files yo your directory
2. Import `db.sql` to your MySQL database
3. Change DB connection settings in `src/Server.php`
4. Run `composer dump-autoload`

Default username is `justas` and password is `password`. If you want to change or add, please update `user_accounts` table, where username is your new username and password is `sha1('password')`;