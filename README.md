# Flarum

An unofficial dokku docker image for Flarum.

## Installation

### Step 1) Setup dokku

Start by creating the dokku app, and mariadb database, and link the two.

```
dokku create flarum
dokku mariadb:create flarum
dokku mariadb:link flarum flarum
```

Now, add a `SITE_URL` config variable pointing to your domain name.

```
dokku config:set flarum SITE_URL=http://example.com
```

### Step 2) Push the repository

Now, check out the repository and push to your dokku server.

```
git clone https://github.com/jacobmarshall/dokku-flarum.git dokku-flarum
cd dokku-flarum
git remote add dokku dokku@example.com:flarum
git push dokku master
```

Sit back and have a cup of tea, the container takes a bit of time to compile some of the dependencies.

### Step 3) Install

Open your browser and navigate to the auto-install script.

`http://example.com/install.php`

It make take a few seconds, but you will be taken to your forum when installation has complete.

If the installation fails, check `http://example.com/install.log` for details.

### Step 4) Login

The default admin credentials are `admin` and `password`. Be sure to change these as soon as the installation has complete.