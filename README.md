# RestAPI - Based on Laravel with Docker
[![Build Status](https://img.shields.io/travis/nicp0nim/rest-api)](https://travis-ci.com/nicp0nim/rest-api)
![Release](https://img.shields.io/github/release/nicp0nim/rest-api)
![Code Size](https://img.shields.io/github/languages/code-size/nicp0nim/rest-api)
![Last commit](https://img.shields.io/github/last-commit/nicp0nim/rest-api)
[![License](https://img.shields.io/github/license/nicp0nim/rest-api)](https://github.com/nicp0nim/rest-api/blob/master/LICENSE)

Laravel 5.8 Restful API boiler plate with auth, crud and json responses.

### Install application.

1. Clone repository and setup.<br>
`git clone git@github.com:nicp0nim/rest-api.git`<br>
`cd rest-api`<br>
`cp .env.example .env`<br>
2. Install needed packages.<br>
`composer install`<br>
3. Migrate, install passport and seed database with fake data.<br>
`php artisan migrate:fresh --seed`<br>
`php artisan passport:install`<br>
4. Start docker.<br>
`docker-compose up -d`
