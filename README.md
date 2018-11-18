## Custom Behance Portfilio built with PHP

This is my PHP edition of the custom behance portolio. I tried to build it from scrach as much as I can, I used cURL to make the requests to the API and composer to load my custom api class

## Instalation

Run this line

```bash
git clone git@github.com:GamertodArk/custom-behance-portfolio-php.git
```

Now install the dependencies with composer

```bash
composer install
```

Now create the optimize outload files to load the custom api class

```bash
composer dump-autoload -o
```

Then rename the `.env.example` to `.env` and filled the requestd data

```
# Paste here your behance client id
BEHANCE_CLIENT_ID=<behance client id>

# Paste here yout behance user id
BEHANCE_USER_ID=<behance user id>

# This is the base of the behance api url, all the request made to the behance api
# are gonna be done using this link as a base. I recomend letting the this a the default
BEHANCE_API_ENDPOINT=https://api.behance.net/v2/users/

# The maximun amount of projects pulled from Behance. the default are 12
BEHANCE_PER_PAGE=12
```

## Screenshot
![Custom Behance Portfolio PHP](https://github.com/GamertodArk/custom-behance-portfolio-php/blob/master/project-screenshot/home-page.png "Custom Behance Portfolio PHP")