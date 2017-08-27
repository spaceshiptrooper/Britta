# Britta

Britta is a light weight `Json` based login system. This login system does not require a `MySQL`, `PostgreSQL`, `SQLite`, or any other databases. This login system uses `Json` files to store user data.

### Requirements
---

- PHP 5.4+
- Read-Write-Execute Permission on `config.php` (0777)
- Read-Write-Execute Permission on `/outside_of_public/` and `/outside_of_public/users/` (0777)

### Installation
---

1. Extract the `Britta` master compressed file into a directory suitable for `Britta`.
2. Move the `/outside_of_public/` directory **outside** of the public directory within your localhost machine or server machine.
3. Make sure that these files have read-write-execute permissions (0777); `config.php`, `/outside_of_public/` and `/outside_of_public/users/`.
4. Launch `Britta` in your browser and start the installation.

### Installation Screen
---

##### First field
- This field basically is the directory location to `/outside_of_public/users/`. It should contain the full path including a trailing slash. Example `/var/www/outside_of_public/users/`.

##### Second field
- This field is the session cookie name. This name refers to `$_SESSION`. This name **SHOULD** be named differently from the cookie name.

##### Third field
- This field is the cookie name. This name refers to `$_COOKIE`. This name **SHOULD** be named differently from the session cookie name.

##### Fourth field
- This field is the `URL`. It should contain the full path to the `URL` including a trailing slash. Example `https://britta.localhost.com/public/`. You can obviously move these files outside of `/public/` and then remove the `public` directory. All you have to do is specify `https://britta.localhost.com/` in the installation screen or replace the `URL` value in the `config.php` file.

##### Fifth field
- This field is for the maximum amount of characters/letters a user is allowed to use for their first name. This field should be in digits/numbers/integers, no strings.

#### Sixth field
- This field is for the minimum amount of characters/letters a user is allowed to use for their first name. This field should be in digits/numbers/integers, no strings.

##### Seventh field
- This field is for the maximum amount of characters/letters a user is allowed to use for their last name. This field should be in digits/numbers/integers, no strings.

#### Eighth field
- This field is for the minimum amount of characters/letters a user is allowed to use for their last name. This field should be in digits/numbers/integers, no strings.

### Manual Installation

---

If you know your way around `PHP`, you can manually configure the `config.php` file with your preferred preferences without going through the installation. All you need to do once you have configured `config.php` is delete these files; `/public/splash.php`, `/template/splash.php`, `/template/splash_setup.php`, and `/images/face.svg`.

### Notes
---

- Currently, I have noted that there is a bug/error after the installation has finished. You get redirected back to the base directory and not the directory that you set the `URL` to.
- Also, you'll receive an error in your error logs saying that the `404.php` file doesn't exist within the base directory. This is ok for now, but I will have to look into a better way of doing this.
- Also, once you browse to the correct location after the installation, you may find yourself at the home screen, but with no styles. Again, I will have to look into making this better. This is due to `undefined index` for the value `__URL__` which really is just a placeholder within the `config.php` file. This value is basically your `URL` you will be putting in place of `__URL__`.

### Bugs - Report - Feedbacks

---

If you find that there are errors in `Britta`, please submit an issue or contact me at [@spaceshiptrooper](https://sitepoint.com/community/users/spaceshiptrooper). Same thing goes with reports and feedbacks. I would like to improve `Britta` where it is needed.