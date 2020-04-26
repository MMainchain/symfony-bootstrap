SYMFONY BOOTSTRAP
=================

This project run a simple and empty  `symfony-web-skeleton` project thanks to docker and docker-compose.
This project contains:

- PHP `7.4.5`
- Symfony `4.4`
- PostgreSQL `9.6`

Prerequisites
-------------

In order to run this project, you'll need to have installed on your environment:

- [Docker](https://docs.docker.com/)
- [docker-compose](https://docs.docker.com/compose/)

With the common configuration, make sure nothing is running on the following ports:

- 8000
- 5432

If you cannot empty one of these ports, think about creating a [docker-compose.override.yaml](https://docs.docker.com/compose/extends/) file.

Usage
--------

### Start

To start the project, run: 

```bash
docker-compose up -d
docker-compose exec php make install
```

Then it will be accessible through `localhost:8000`.

The project is linked to a postgreSQL database, which can handle isolated fixtures from test environement.

Stop
--------

To stop, run:

```bash
docker-compose down
```

Testing
-------

Testing using PHPUnit:

```bash
docker-compose exec php make test
```

You can see your code coverage report in `./build/coverage/index.html` thanks to a web navigator.

Note that the test database is completely isolated from dev database.
In addition, the database is reset after every test case thanks to `dama/doctrine-test-bundle`.